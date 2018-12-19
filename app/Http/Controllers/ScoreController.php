<?php

namespace Jiri\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Jiri\Http\Requests\StoreScore;
use Jiri\Implement;
use Jiri\Jiri;
use Jiri\Project;
use Jiri\Score;
use Illuminate\Http\Request;
use Jiri\Student;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScore $request)
    {
        $validatedData = $request->all();
        Score::create($validatedData);
        $implements = Implement::find($request->get('implement_id'));
        $student = $implements->student;
        return \Redirect::action('JiriStudentController@show', $student->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jiri\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jiri\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {

        $implement = Implement::find($score->implement_id);

        $project = Project::find($implement->project_id);

        $jiri = Jiri::find(1);
        $students = $jiri->load('students');

        $implements = Student::find($implement->student_id)->load('implementsForCurrentJiriWithProject');

        $currentStudent = Student::find($implement->student_id)->load(['implementsForCurrentJiriWithProject'=> function ($q) use($project){
            $q->where('project_id', $project->id);
    }]);
        return view('project.editCotationOneProject', ['score' => $score, 'currentStudent' => $currentStudent, 'implements' => $implements, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jiri\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        $score->update($request->all());
        $implements = Implement::find($score->implement_id);
        $student = $implements->student;
        return \Redirect::action('JiriStudentController@show', $student->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jiri\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
