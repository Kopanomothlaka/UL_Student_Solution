<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class StudentEventController extends Controller
{
    // Fetch events for the student calendar
    public function fetchEvents()
    {
        $events = Event::all(); // Fetch all events from the database
        return response()->json($events);
    }

    // Display the student events view
    public function index()
    {
        return view('student.events'); // Adjust the view path as necessary
    }
}
