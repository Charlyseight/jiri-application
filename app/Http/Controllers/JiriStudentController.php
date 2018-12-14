<?php

namespace Jiri\Http\Controllers;

use Illuminate\Http\Request;
use Jiri\Jiri;
use Jiri\Student;

class JiriStudentController extends Controller
{
    public function show(Jiri $jiri, Student $student){
        $student =  $student->load('implementsForCurrentJiriWithProject');
        return view('students.oneStudent', ['student' => $student, 'jiri' => $jiri]);
    }
}
