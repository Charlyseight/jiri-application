<?php

namespace Jiri\Http\Controllers;

use Illuminate\Http\Request;
use Jiri\Jiri;
use Jiri\People;
use Jiri\Student;
use Jiri\User;

class DashboardController extends Controller
{
    public function index(){
        $people = People::where('jiri_id', session('jiri_id'))->where('person_type', 'jiri\Student')->get();
        $students = [];
        foreach($people as $person){
            $currentPerson = Student::where('id', $person->person_id)->first();
            $students[] = $currentPerson;
        }
        $allStudents = [];
        foreach($students as $student){
            $oneStudent = $student->load('implementsForCurrentJiriWithProjectAndScores');
            $allStudents[] = $oneStudent;
        }

        return $allStudents;
    }

    public function getJudgesForDashboard(){
        $people = People::where('jiri_id', session('jiri_id'))->where('person_type', 'jiri\user')->get();
        $judges = [];
        foreach($people as $person){
            $currentPerson = User::where('id',$person->person_id)->first();
            $judges [] = $currentPerson;
        }

        return $judges;
    }

    public function getJiriForDashboard(){
        $jiri = Jiri::where('id', session('jiri_id'))->first();

        return $jiri;
    }
}
