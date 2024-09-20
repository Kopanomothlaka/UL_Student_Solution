<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassoutController extends Controller
{
    //
    public function index()
    {
        // Fetching all devices from the database
        $devices = Device::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();        // Passing data to the view
        return view('student.passOur', ['devices' => $devices]);
    }
    public function map()
    {
        return view('student.map'); // Create this view
    }
}
