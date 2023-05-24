<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Challenge;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ChallengeCreateEditRequest;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $challenges = Challenge::paginate(config('app.pagination'));

		return Inertia::render('Admin/Challenges/List', [
			'challenges' => $challenges
		]);
	}

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Admin/Challenges/Create', [
            'challenge_types' => Challenge::TYPE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(ChallengeCreateEditRequest $request)
    {
        $image = $request->input('image');
        $imageLink = $this->saveFile($image);

        $legal = $request->input('legal');
        $legalLink = $this->saveFile($legal);

        $edited = $request->all();
        $edited['image'] = $imageLink;
        $edited['legal'] = $legalLink;

        if($request->challenge_type == 'visibility') {
            $participation = json_decode($request->participation, true);

            foreach ($participation as $value) {
                $participation_array[] = [
                    'name' => $value['name'],
                    'material' => $value['material'],
                    'score' => $value['score'],
                    'image' => $this->saveFile($value['image'])
                ];
            }

            $edited['participation'] = json_encode($participation_array);
        }

        if($request->challenge_type == 'recommendation') {
            $edited['participation'] = $request->participation;
        }

        Challenge::create($edited);

        return redirect()->route('admin.challenges.index')->with('message', 'Se ha creado con éxito');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Challenge $challenge)
    {
        return Inertia::render('Admin/Challenges/Edit', [
            'challenge' => $challenge,
            'challenge_types' => Challenge::TYPE
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, ChallengeCreateEditRequest $request)
    {
        $edited = $request->all();

        if(!filter_var($request->image, FILTER_VALIDATE_URL)) {
            $image = $request->image;
            $imageLink = $this->saveFile($image);
            $edited['image'] = $imageLink;
        }

        if(!filter_var($request->file, FILTER_VALIDATE_URL)) {
            $legal = $request->legal;
            $leagalLink = $this->saveFile($legal);
            $edited['legal'] = $leagalLink;
        }

        if($request->challenge_type == 'visibility') {
            $participation = json_decode($request->participation, true);

            foreach ($participation as $value) {
                $participation_array[] = [
                    'name' => $value['name'],
                    'material' => $value['material'],
                    'score' => $value['score'],
                    'image' => !filter_var($value['image'], FILTER_VALIDATE_URL)
                        ? $this->saveFile($value['image'])
                        : $value['image']
                ];
            }

            $edited['participation'] = json_encode($participation_array);
        }

        if($request->challenge_type == 'recommendation') {
            $edited['participation'] = $request->participation;
        }

        Challenge::find($id)->update($edited);

        return redirect()->route('admin.challenges.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Challenge::find($id)->delete();
        } catch (QueryException $th) {
            return redirect()->back()->withErrors('No se puede eliminar un reto que tiene participaciones');
        }


        return redirect()->route('admin.challenges.index')->with('message', 'Se ha eliminado con éxito');
    }

    public function saveFile($file) {
			$img = base64_decode(preg_replace('/^data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+);base64,/', '', $file));
			$type = explode(';', $file)[0];
			$type = explode('/', $type)[1];
			$name = Str::random(10).'.'.$type;
			$path = storage_path('/app/public/challenge/');

			file_put_contents($path.$name, $img);

			return asset(Storage::disk('public')->url('challenge/'.$name));
    }
}
