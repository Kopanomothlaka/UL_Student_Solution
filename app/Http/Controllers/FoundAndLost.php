<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoundAndLost extends Controller
{
    public function index()
    {
        // Fetching all devices from the database
        return view('lostItems');
    }
}
