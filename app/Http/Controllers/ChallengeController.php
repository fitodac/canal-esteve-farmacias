<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Score;
use App\Models\Challenge;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Participation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChallengeFrontRequest;

class ChallengeController extends Controller
{
    public function index() {

		$recommendation_challenges = Challenge::recommendation()->active()->get();
		$visibility_challenges = Challenge::visibility()->active()->get();

		return Inertia::render('Challenge/List', [
			'recommendationChallenges' => $recommendation_challenges,
			'visibilityChallenges' => $visibility_challenges
		]);
	}

    public function show($id) {

        $challenge = Challenge::find($id);
        $participation = Participation::where(['challenge_id' => $challenge->id, 'user_id' => Auth::id(), 'approved' => true])->get();
        $total_participate_score = $participation->where('approved', true)->sum('earned_points');
        $score = Score::where('user_id', Auth::id())->first();

        return Inertia::render('Challenge/View', [
			'challenge' => $challenge,
            'participation' => $participation,
            'total_participate_score' => $total_participate_score,
            'score' => $score,
		]);

    }

    public function store(ChallengeFrontRequest $request) {
        $user = User::where('id', Auth::id())->first();
        $challenge = Challenge::find($request->challenge_id);

        if($user->hasRole('titular')) {
            return redirect()->back()->withErrors('message', 'No puedes acceder a los retos');
        }

        $file = $this->saveFile($request->file['code']);

        $session_user = json_decode($request->session()->get('user'), true);

        $formData = null;
        $total = null;

        if($request->challenge_type == 'recommendation') {
            $formData['date_start'] = $request->date_start;

            foreach ($request->products as $product) {
                $formData['products'][] = [
                    'name' => $product['name'],
                    'qty' => $product['qty'],
                ];
                $total += $product['qty'];
            }

            // el total no puede superar el maximo establecido
            $total = $total > $challenge->score ? $challenge->score : $total;

            if($request->upload_type !== 'ticket') {
                $formData['date_end'] = $request->date_end;
            }
        }

        if($request->mailing == true && $session_user['mailing'] == 'N') {
            $this->addToMailing();
        }

        Participation::create([
            'user_id' => $user->id,
            'challenge_id' => $request->challenge_id,
            'pharmacy_id' => $user->pharmacy_id,
            'formdata' => json_encode($formData),
            'earned_points' => $total ?? $request->score,
            'file' => $file
        ]);
    }

    public function saveFile($file) {
			$img = base64_decode(preg_replace('/^data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+);base64,/', '', $file));
			$type = explode(';', $file)[0];
			$type = explode('/', $type)[1];
			$name = Str::random(10).'.'.$type;
			$path = storage_path('/app/public/participants/');

			file_put_contents($path.$name, $img);

			return asset(Storage::disk('public')->url('participants/'.$name));
    }

    public function addToMailing() {
        // hacer la llamda a la api para cambiar 1 solo campo..
    }
}
