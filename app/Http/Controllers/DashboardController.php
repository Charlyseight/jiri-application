<?php

namespace Jiri\Http\Controllers;

use Illuminate\Http\Request;
use Jiri\Student;

class DashboardController extends Controller
{
    public function index(Student $student){
        $student = Student::All()->load('implementsForCurrentJiriWithProject');
        return view('admin.dashboard', ['student' => $student]);
    }
}
