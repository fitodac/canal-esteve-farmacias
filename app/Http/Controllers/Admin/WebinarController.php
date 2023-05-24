<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Webinar;
use App\Traits\SaveFileTrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\Admin\WebinarCreateEditRequest;

class WebinarController extends Controller
{
    use SaveFileTrait;

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $webinars = Webinar::paginate(config('app.pagination'));

		return Inertia::render('Admin/Webinars/List', [
			'webinars' => $webinars
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Webinars/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebinarCreateEditRequest $request)
    {
        $edited = $request->all();

        $image = $request->image;

        $imageLink = $this->saveImage($image, 'webinars');

        $edited['image'] = $imageLink;

        $speaker = json_decode($request->speaker, true);

        foreach ($speaker as $value) {
            $speaker_array[] = [
                'name' => $value['name'],
                'profession' => $value['profession'] ?? null,
                'description' => $value['description'] ?? null,
                'image' => $value['image']
                    ? $this->saveFile($value['image'], 'webinars')
                    : null
            ];
        }

        $edited['speaker'] = json_encode($speaker_array);

        Webinar::create($edited);

        return redirect()->route('admin.webinars.index')->with('message', 'Se ha creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        return Inertia::render('Admin/Webinars/Edit', [
            'webinar'   => $webinar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebinarCreateEditRequest $request, $id)
    {
        $edited = $request->all();

        if(!filter_var($request->image, FILTER_VALIDATE_URL)) {
            $image = $request->image;
            $imageLink = $this->saveImage($image, 'webinars');
            $edited['image'] = $imageLink;
        }

        $speaker = json_decode($request->speaker, true);

        foreach ($speaker as $value) {
            $speaker_array[] = [
                'name' => $value['name'],
                'profession' => $value['profession'] ?? null,
                'description' => $value['description'] ?? null,
                'image' => $value['image']
                    ? (!filter_var($value['image'], FILTER_VALIDATE_URL)
                        ? $this->saveFile($value['image'], 'webinars')
                        : $value['image'])
                    : null
            ];
        }

        $edited['speaker'] = json_encode($speaker_array);

        Webinar::find($id)->update($edited);

        return redirect()->route('admin.webinars.index')->with('message', 'Se ha actualizado con éxito');
    }

/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Webinar::find($id)->delete();
        } catch (QueryException $th) {
            return redirect()->back()->withErrors('No se puede eliminar el webinar');
        }


        return redirect()->route('admin.webinars.index')->with('message', 'Se ha eliminado con éxito');
    }

    public function toggleActive($id) {
        $webinar = Webinar::find($id);

        $webinar->active = !$webinar->active;
        $webinar->save();
    }
}
