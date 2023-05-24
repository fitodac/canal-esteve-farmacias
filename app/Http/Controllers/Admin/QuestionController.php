<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Module;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\Admin\QuestionCreateEditRequest;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $questions = Question::with('module.course')->paginate(config('app.pagination'));

		return Inertia::render('Admin/Questions/List', [
			'questions' => $questions
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

		return Inertia::render('Admin/Questions/Create', [
			'courses' => $courses,
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateEditRequest $request)
    {
        Question::create($request->all());

        return redirect()->route('admin.questions.index')->with('message', 'Se ha creado con éxito');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $courses = Course::active()->get();
        $selectedCourse = Module::with('course')->where('id', $question->module_id)->first();

        return Inertia::render('Admin/Questions/Edit', [
            'courses'           => $courses,
            'question'          => $question,
            'answers'           => $question->getRawOriginal('answers'),
            'selectedCourse'    => [
                'id'    => $selectedCourse->course->id,
                'name'  => $selectedCourse->course->name
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionCreateEditRequest $request, $id)
    {
        Question::find($id)->update($request->all());

        return redirect()->route('admin.questions.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Question::find($id)->delete();
        } catch (QueryException $th) {
            return redirect()->back()->withErrors('No se puede eliminar un curso con módulos');
        }


        return redirect()->route('admin.questions.index')->with('message', 'Se ha eliminado con éxito');
    }

    public function toggleActive($id) {
        $question = Question::find($id);

        $question->active = !$question->active;
        $question->save();
    }
}
