<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Format;
use App\Models\Category;
use App\Traits\SaveFileTrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\Admin\CoursesCreateEditRequest;

class CourseController extends Controller
{
    use SaveFileTrait;

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $courses = Course::with('format')->paginate(config('app.pagination'));

		return Inertia::render('Admin/Courses/List', [
			'courses' => $courses
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::popularFields()->get();
        $format = Format::get();

        return Inertia::render('Admin/Courses/Create', [
            'categories'    => $categories,
            'format'        => $format,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesCreateEditRequest $request)
    {
        $edited = $request->all();

        $image = $request->image;
        $imageLink = $this->saveImage($image, 'courses');

        $edited['image'] = $imageLink;
        $edited['score'] = $edited['format_id'] !== '2' ? $edited['score'] : 0;

        $teacher = json_decode($request->teacher, true);

        foreach ($teacher as $value) {
            $teacher_array[] = [
                'name' => $value['name'],
                'profession' => $value['profession'] ?? null,
                'description' => $value['description'] ?? null,
                'specialty' => $value['specialty'] ?? null,
                'image' => $value['image']
                    ? $this->saveFile($value['image'], 'courses')
                    : null
            ];
        }

        $edited['teacher'] = json_encode($teacher_array);

        Course::create($edited);

        return redirect()->route('admin.courses.index')->with('message', 'Se ha creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::popularFields()->get();
        $format = Format::get();

        return Inertia::render('Admin/Courses/Edit', [
            'course'        => $course,
            'categories'    => $categories,
            'format'        => $format
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesCreateEditRequest $request, $id)
    {
        $edited = $request->all();

        if(!filter_var($request->image, FILTER_VALIDATE_URL)) {
            $image = $request->image;
            $imageLink = $this->saveImage($image, 'courses');
            $edited['image'] = $imageLink;
        }

        $edited['score'] = $edited['format_id'] !== '2' ? $edited['score'] : 0;

        $teacher = json_decode($request->teacher, true);

        foreach ($teacher as $value) {
            $teacher_array[] = [
                'name' => $value['name'],
                'profession' => $value['profession'] ?? null,
                'description' => $value['description'] ?? null,
                'specialty' => $value['specialty'] ?? null,
                'image' => $value['image']
                    ? (!filter_var($value['image'], FILTER_VALIDATE_URL)
                        ? $this->saveFile($value['image'], 'courses')
                        : $value['image'])
                    : null
            ];
        }

        $edited['teacher'] = json_encode($teacher_array);

        Course::find($id)->update($edited);

        return redirect()->route('admin.courses.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Course::find($id)->delete();
        } catch (QueryException $th) {
            return redirect()->back()->withErrors('No se puede eliminar un curso con módulos');
        }


        return redirect()->route('admin.courses.index')->with('message', 'Se ha eliminado con éxito');
    }

    public function toggleActive($id) {
        $course = Course::find($id);

        $course->active = !$course->active;
        $course->save();
    }
}
