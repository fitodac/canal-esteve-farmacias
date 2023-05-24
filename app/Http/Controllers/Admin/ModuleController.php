<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Module;
use App\Traits\SaveFileTrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\Admin\ModuleCreateEditRequest;

class ModuleController extends Controller
{
    use SaveFileTrait;

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $modules = Module::with('course','parent')->paginate(config('app.pagination'));

		return Inertia::render('Admin/Modules/List', [
			'modules' => $modules
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::active()->get();
        $modules = Module::get();

		return Inertia::render('Admin/Modules/Create', [
			'courses' => $courses,
			'modules' => $modules
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleCreateEditRequest $request)
    {
        $edited = $request->all();

        $teacher = json_decode($request->teacher, true);

        $teacher_array = [
            'name' => $teacher['name'],
            'profession' => $teacher['profession'] ?? null,
            'description' => $teacher['description'] ?? null,
            'specialty' => $teacher['specialty'] ?? null,
            'image' => $teacher['image']
                ? $this->saveFile($teacher['image'], 'courses')
                : null
        ];

        $edited['teacher'] = json_encode($teacher_array);

        Module::create($edited);

        return redirect()->route('admin.modules.index')->with('message', 'Se ha creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $courses = Course::active()->get();

        return Inertia::render('Admin/Modules/Edit', [
            'courses'   => $courses,
            'module'    => $module,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleCreateEditRequest $request, $id)
    {
        $edited = $request->all();

        $teacher = json_decode($request->teacher, true);

        $teacher_array = [
            'name' => $teacher['name'],
            'profession' => $teacher['profession'] ?? null,
            'description' => $teacher['description'] ?? null,
            'specialty' => $teacher['specialty'] ?? null,
            'image' => $teacher['image']
                ? (!filter_var($teacher['image'], FILTER_VALIDATE_URL)
                    ? $this->saveFile($teacher['image'], 'courses')
                    : $teacher['image'])
                : null
        ];

        $edited['teacher'] = json_encode($teacher_array);

        Module::find($id)->update($edited);

        return redirect()->route('admin.modules.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Module::find($id)->delete();
        } catch (QueryException $th) {
            return redirect()->back()->withErrors('No se puede eliminar un módulos con preguntas');
        }


        return redirect()->route('admin.modules.index')->with('message', 'Se ha eliminado con éxito');
    }

    public function toggleActive($id) {

        $module = Module::find($id);

        $module->active = !$module->active;
        $module->save();
    }

    public function getModulesByCourse($course_id) {
        $modules = Module::where('course_id', $course_id)->get();

        return response()->json($modules);
    }
}
