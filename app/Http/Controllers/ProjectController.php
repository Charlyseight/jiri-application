<?php

namespace Jiri\Http\Controllers;

use Jiri\Implement;
use Jiri\Jiri;
use Jiri\Project;
use Illuminate\Http\Request;
use Jiri\Student;

class ProjectController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jiri\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Jiri $jiri, Student $student, Project $project)
    {
        $students = Student::all();
        $implements = $student->load('implementsForCurrentJiriWithProject');
        return view('project.cotationOneProject', ['project' => $project, 'currentStudent' => $student, 'students' => $students, 'implements'=> $implements ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jiri\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jiri\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jiri\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $projects)
    {
        //
    }
}
