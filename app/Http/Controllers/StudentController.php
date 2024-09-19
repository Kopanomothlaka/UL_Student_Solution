<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.dashboard'); // Create this view
    }
    public function lecturer()
    {
        return view('student.lecturers'); // Create this view
    }
    public function updates()
    {
        return view('student.updates'); // Create this view
    }
}
