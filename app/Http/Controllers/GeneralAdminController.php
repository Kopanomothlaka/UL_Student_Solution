<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralAdminController extends Controller
{
    // Show the general admin dashboard
    public function index()
    {
        return view('admin.general_dashboard'); // Ensure this view exists
    }
}
