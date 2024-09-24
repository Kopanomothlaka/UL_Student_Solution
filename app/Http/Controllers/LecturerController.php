<?php

namespace App\Http\Controllers;

use App\Models\User; // Assuming User model is used for lecturers
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public function index()
    {
        // Fetch lecturers from users table
        $lecturers = User::where('role', 'lecturer')->get();

        return view('student.lecturers', compact('lecturers'));
    }

    public function availability()
    {
        // Fetch the current logged-in user (lecturer)
        $currentLecturer = Auth::user();

        // Fetch all other lecturers from the users table
        $lecturers = User::where('role', 'lecturer')->where('id', '!=', $currentLecturer->id)->get();

        return view('lecturer.availability', compact('currentLecturer', 'lecturers'));
    }

    public function updateAvailability(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:available,unavailable', // Adjust as needed
        ]);

        // Get the currently logged-in user
        $lecturer = Auth::user();

        // Update the lecturer's status
        $lecturer->status = $request->status;
        $lecturer->save();

        // Redirect back with a success message
        return redirect()->route('lecturer.availability')->with('success', 'Availability status updated successfully!');
    }

}
