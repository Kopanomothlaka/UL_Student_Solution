<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Ensure you have this view created
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // First, check if the user is an admin
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Admin login successful, redirect based on admin role
            if ($admin->role === 'security_admin') {
                return redirect()->route('admin.security.dashboard'); // Security Admin dashboard
            } elseif ($admin->role === 'general_admin') {
                return redirect()->route('admin.security.dashboard'); // General Admin dashboard
            }
        }

        // If the user is not an admin, attempt to log in as a regular user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Get the authenticated user
            $user = Auth::user();

            // Redirect based on user role
            if ($user->role === 'lecturer') {
                return redirect()->route('student.dashboard'); // Lecturer dashboard route
            } elseif ($user->role === 'student') {
                return redirect()->route('student.dashboard'); // Student dashboard route
            }
        }

        // If unsuccessful, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
