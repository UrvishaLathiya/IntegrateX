<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show Profile Edit Page
    public function edit()
    {
        if (!Session::has('student_id')) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $student = Student::find(Session::get('student_id'));

        if (!$student) {
            return redirect()->route('login')->with('error', 'Student not found.');
        }

        return view('student-profile', compact('student'));
    }

    // Update Profile Data
    public function update(Request $request, $id)
    {
        if (!Session::has('student_id')) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Ensure the session ID matches the user being updated
        if (Session::get('student_id') != $id) {
            return redirect()->route('profile.edit')->with('error', 'Unauthorized access.');
        }

        $student = Student::find($id);

        if (!$student) {
            return redirect()->route('profile.edit')->with('error', 'Student not found.');
        }

        // Validation
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'role' => 'required|string',
            'age' => 'required|integer|min:1',
            'address' => 'required|string',
            'phone' => 'required|string',
            'githubuserid' => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);

        // Update Student Data
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->role = $request->role;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->githubuserid = $request->githubuserid;

        // Only update password if a new one is provided
        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        $student->save(); // Save updated data

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
