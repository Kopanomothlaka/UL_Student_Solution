<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassoutController extends Controller
{
    //
    public function index()
    {
        return view('student.passOur'); // Create this view
    }
    public function map()
    {
        return view('student.map'); // Create this view
    }
}
