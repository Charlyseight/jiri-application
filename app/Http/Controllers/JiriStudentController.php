<?php

namespace Jiri\Http\Controllers;

use Illuminate\Http\Request;
use Jiri\Impression;
use Jiri\Jiri;
use Jiri\Score;
use Jiri\Student;

class JiriStudentController extends Controller
{
    public function show(Jiri $jiri, Student $student){
        $jiri = Jiri::find(1);
        $students = $jiri->load('students');

        $impressionForCurrentJiri = Impression::where([['jiri_id', session('jiri_id')], ['student_id', $student->id], ['user_id', auth()->id()]])->get();

        $student =  $student->load('implementsForCurrentJiriWithProjectAndScore');

        return view('students.oneStudent', ['student' => $student, 'jiri' => $jiri, 'impressionForCurrentJiri' => $impressionForCurrentJiri, 'students' => $students]);
    }
}
