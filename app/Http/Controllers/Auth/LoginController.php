<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Ensure you have this view created
    }


    // Handle the login request
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Get the authenticated user
            $user = Auth::user();

            // Redirect based on user role
            if ($user->role === 'lecturer') {
                return redirect()->route('student.dashboard'); // Change this to your lecturer dashboard route
            } elseif ($user->role === 'student') {
                return redirect()->route('student.dashboard'); // Change this to your student dashboard route
            }
        }

        // If unsuccessful, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
