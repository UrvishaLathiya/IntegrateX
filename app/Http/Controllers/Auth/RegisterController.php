<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // Ensure you have a Student model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentRegisterController extends Controller
{
    // Show the student register form
    public function showRegisterForm()
    {
        return view('student-register'); // Matches resources/views/student-register.blade.php
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'skill' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'age' => 'required|integer|min:18',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15',
            'githubuserid' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new student record
        Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'skill' => $request->skill,
            'role' => $request->role,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
            'githubuserid' => $request->githubuserid,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password
        ]);

        return redirect()->route('student.register')->with('success', 'Registration successful!');
    }
}
