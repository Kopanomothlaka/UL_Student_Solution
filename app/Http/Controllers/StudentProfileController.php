<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function profile()
    {
        return view('student.profile.StudentProfile'); // Create this view
    }
}
