<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function profile()
    {
        return view('student.profile.StudentProfile'); // Create this view
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the profile data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update user's profile details
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');

        // Check if the password fields were filled
        if ($request->filled('current_password') && $request->filled('new_password')) {
            // Validate the password change fields
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed', // 'confirmed' checks if new_password matches new_password_confirmation
            ]);

            // Check if the current password matches
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            // Update the password
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token to avoid session fixation
        $request->session()->regenerateToken();

        // Redirect to the login page or wherever you want after logout
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }


    public function toggleAvailability(Request $request)
    {
        $user = auth()->user();

        // Ensure the user is a lecturer
        if ($user->role !== 'lecturer') {
            return redirect()->back()->with('error', 'Only lecturers can update their availability.');
        }

        // Toggle availability status
        $user->status = $user->status === 'available' ? 'Unavailable' : 'available';
        $user->save();

        return redirect()->back()->with('status', 'Availability updated successfully.');
    }



}
