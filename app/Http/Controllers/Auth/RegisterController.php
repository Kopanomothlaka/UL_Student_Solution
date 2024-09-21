<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration'); // Ensure the view exists
    }

    public function register(Request $request)
    {
        // Validate the request
        $this->validator($request->all())->validate();

        // Create the user
        $user = User::create([
            'name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in after registration
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful! Welcome!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => [
                'required',
                'string',
                'max:15',
                'unique:users,phone', // Ensure phone is unique in the users table
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email', // Ensure email is unique in the users table
            ],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'phone.unique' => 'The phone number has already been taken.',
            'email.unique' => 'The email address has already been taken.',
        ]);
    }
}
