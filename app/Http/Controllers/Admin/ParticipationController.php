<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\Participation;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParticipationsExport;
use Illuminate\Support\Facades\Storage;

class ParticipationController extends Controller
{
    protected const MAXIMUNACCUMULATED =  70;

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(Request $request) {

        $search = $request->search ?? null;

        $participations = Participation::query()
            ->with('user', 'challenge', 'pharmacy')
            ->whereHas('user', function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->orWhereHas('challenge', function($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->orWhereHas('pharmacy', function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate(config('app.pagination'))->withQueryString();

		return Inertia::render('Admin/Participations/List', [
			'participations'    => $participations,
            'search'            => $search
		]);
	}

    public function show(Participation $participation) {
        $participation->loadMissing(['user', 'challenge', 'pharmacy']);
		return Inertia::render('Admin/Participations/View', [
			'participation' => $participation
		]);
    }

    public function approve($id, $approved, $approved_score = null) {
        $participation = Participation::with('challenge')->find($id);
        $message = 'Se ha aprobado el reto.';
        $score = $accumulated = $participation->earned_points;


        if ($approved == 'approve' && $this->maximunScoreReachPerYear($participation->user_id)) {
            return redirect()->back()->withErrors('Esta persona ya alcanzó la máxima cantidad de puntos anuales');
        }

        if($participation->challenge->challenge_type == 'visibility') {
            $already_approved = Participation::where(['challenge_id' => $participation->challenge_id, 'user_id' => $participation->user_id, 'approved' => true ])->first();

            if ($already_approved && $approved == 'approve') {
                return redirect()->back()->withErrors('Esta persona ya fue aprobada en el mismo reto anteriormente');
            }

            if(($approved_score == null || $approved_score == 0) && $approved == 'approve') {
                return redirect()->back()->withErrors('El puntaje a asignar es requerido');
            }

            $score = $accumulated = $approved_score;
        }

        $this->sendMail($approved, $participation->user_id);

        if ($approved == 'disapprove') {
            $participation->earned_points = 0;
            $participation->approved = false;
            $participation->update();

            $message = 'Hemos enviado un correo para notificar la no aprobación.';
            return redirect()->route('admin.participation.index')->with('message', $message);
        }

        $scoreModel = Score::firstOrNew(
            ['user_id' => $participation->user_id],
            [
                'score' => $score,
                'accumulated' => $accumulated,
                'valid_until' => Carbon::now()->startOfYear()->addYear(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $greater_than = intval($scoreModel->accumulated) + $accumulated;

        if ($greater_than > self::MAXIMUNACCUMULATED) {
            $accumulated = self::MAXIMUNACCUMULATED - intval($scoreModel->accumulated);
        }

        if ($scoreModel->exists) {
            $scoreModel->increment('score', $score);
            $scoreModel->increment('accumulated', $accumulated);
        } else {
            $scoreModel->save();
        }

        $participation->earned_points = $accumulated;
        $participation->approved = true;
        $participation->update();

        return redirect()->route('admin.participation.index')->with('message', $message);
    }


    public function sendMail($type, $user_id) {
        $subject =  '¡Tu participación en el reto ha sido aprobada!';
        $view = 'approve_mail';

        if($type == 'disapprove') {
            $subject =  'Lamentamos comunicarte que tu participación en el reto no ha sido aprobada';
            $view = 'disapprove_mail';
        }

        $from = config('mail.from.address');

        $user = User::find($user_id);
        $to = $user->email;

        try {
            Mail::send($view, [], function($message) use ($from, $to, $subject){
                $message->from($from);
                $message->to($to)->subject($subject);
            });

        } catch (\Throwable $th) {
            Log::info($th);
        }
    }

    public function export()
    {
        $name = 'participacion-'.date('Y-m-d').'.xlsx';
        Excel::store(new ParticipationsExport, $name, 'export');

        return Storage::disk('export')->download($name, $name, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
    }

    public function maximunScoreReachPerYear($user_id, $score = self::MAXIMUNACCUMULATED) {
        $accumulated = Score::where('user_id', $user_id)->first();

        return ($accumulated->accumulated ?? 0) >= $score;
    }
}
