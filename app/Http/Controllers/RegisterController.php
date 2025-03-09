<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class RegisterController extends Controller
{
    // Show register page
    public function showRegister()
    {
        return view('register');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6',
            'role' => 'nullable|string',
            'age' => 'nullable|integer',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'githubuserid' => 'nullable|string',
        ]);

        // Save student data
        Student::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
            'age' => $validatedData['age'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'githubuserid' => $validatedData['githubuserid'],
        ]);

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    // Show login page
    public function showLogin()
    {
        return view('login');
    }
}
