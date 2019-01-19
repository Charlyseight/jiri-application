<?php

namespace Jiri\Http\Controllers;

use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Jiri\Groupe_Student;
use Jiri\Implement;
use Jiri\Jiri;
use Illuminate\Http\Request;
use Jiri\Mail\JiriStarted;
use Jiri\Mail\JiriStoped;
use Jiri\People;
use Jiri\Project;
use Jiri\Score;
use Jiri\Student;
use Jiri\User;

class JiriController extends Controller
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
        $name = $request['name'];
        $date = $request['date'];
        $hour = $request['hour'];
        $schedule_on = $date . ' ' . $hour;
        $allProjects = $request['allProjects'];
        $allJudges = $request['allJudges'];
        $allOldJudge = $request['allOldJudge'];
        $selectedProjects = $request['selectedProjects'];

        $jiri = Jiri::create(['name' => $name, 'user_id'=> auth()->id(), 'schedule_on' => $schedule_on]);


        if(!empty($allProjects)){
            foreach ($allProjects as $project){
                Project::create([
                    'name' => $project['name'],
                    'tags' => $project['tags'],
                ]);
            }
        }
        if(!empty($allJudges)){
            foreach($allJudges as $judge){
                $user = User::create([
                    'name' => $judge['name'],
                    'email' => $judge['email'],
                    'password' => Hash::make('secret'),
                    'api_token' => str_random(60)
                ]);
                People::create([
                    'jiri_id'=> $jiri->id,
                    'person_id'=> $user->id,
                    'person_type' => 'jiri\User'
                ]);

            }
        }
        if(!empty($allOldJudge)){
            foreach ($allOldJudge as $addOldJudge){
                $user = User::where('email', $addOldJudge['email'])->first();
                People::create([
                    'jiri_id'=> $jiri->id,
                    'person_id'=> $user->id,
                    'person_type' => 'jiri\User',
                ]);
            }
        }
        $groupeStudent = Groupe_Student::where('group_id', $request['groupeId'])->get();
        if(!empty($groupeStudent)){
            foreach ($groupeStudent as $studId ) {
                People::create([
                    'jiri_id' => $jiri->id,
                    'person_id' => $studId->id,
                    'person_type' => 'jiri\Student',
                ]);
                foreach ($allProjects as $project) {
                $project = Project::where('name', $project['name'])->first();
                    Implement::create([
                        'student_id' => $studId->id,
                        'project_id' => $project->id,
                        'jiri_id' => $jiri->id,
                    ]);
                }
            }
        }
        if(!empty($groupeStudent)){
            foreach ($groupeStudent as $studId ) {
                foreach ($selectedProjects as $oneOldPro) {
                    $project = Project::where('name', $oneOldPro['name'])->first();
                    Implement::create([
                        'student_id'=> $studId->id,
                        'project_id' => $project->id,
                        'jiri_id' => $jiri->id,
                    ]);
                }
            }
        }
    }

    public function addInJiri(Request $request){
        $allProjects = $request['allProjects'];
        $allJudges = $request['allJudges'];

        if(!empty($allProjects)){
            foreach ($allProjects as $project){
                Project::create([
                    'name' => $project['name'],
                    'tags' => $project['tags'],
                ]);
            }
        }
        if(!empty($allJudges)){
            foreach($allJudges as $judge){
                $user = User::create([
                    'name' => $judge['name'],
                    'email' => $judge['email'],
                    'password' => Hash::make('secret'),
                    'api_token' => str_random(60)
                ]);
                People::create([
                    'jiri_id'=> $request['jiri_id'],
                    'person_id'=> $user->id,
                    'person_type' => 'jiri\User'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function show(Jiri $jiri)
    {
        $currentJiri = $jiri->load('students');
        return view('students.allStudents', ['currentJiri' => $currentJiri]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function edit(Jiri $jiries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jiri $jiries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jiri $jiries, Request $request)
    {
        $id = $request['id'];
        $jiri = Jiri::where('id', $id);
        $jiri->delete();
        $implementations = Implement::where('jiri_id', $id)->get();
        foreach($implementations as $i){
            $i->delete();
        }
        $people = People::where('jiri_id',$id)->get();
        foreach($people as $p){
            $p->delete();
        }
    }

    public function startJiri(Request $request){
        $id = $request['id'];
        $jiri = Jiri::findOrfail($id)->load('judges');
        session(['jiri_id' => $jiri->id]);
        $jiri->is_active = true;
        $jiri->save();
        foreach ($jiri->judges as $judge){
            $judge->token = time(). '$'. $judge->id. '$'. $jiri->id;
            $judge->save();
            Mail::to($judge->email)->send(new JiriStarted($judge,$jiri));
        }


    }

    public function stopJiri(Request $request){
        $id = $request['id'];
        $jiri = Jiri::findOrfail($id)->load('judges');
        $jiri->is_active = false;
        $jiri->save();
        foreach ($jiri->judges as $judge){
            $judge->token = null;
            $judge->save();
            Mail::to($judge->email)->send(new JiriStoped($judge,$jiri));
        }
    }

    public function modifyForm(Request $request){
        $jiri = Jiri::where('id', $request['id'])->first();
        return $jiri;
    }

    /*public function getImplements(Student $student){
        $students = Student::All();
        $studentChart = [];
        foreach($students as $student){
            $oneStudent = $student->load('implementsForCurrentJiriWithProjectAndScores');
            array_push($studentChart, $oneStudent);
        }
        return $studentChart;
    }*/
}
