<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    // Show Profile Edit Page
    public function edit()
    {
        // Check if the session has a student_id
        if (!Session::has('student_id')) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Fetch the student based on session ID
        $student = Student::find(Session::get('student_id'));

        if (!$student) {
            return redirect()->route('login')->with('error', 'Student not found.');
        }

        return view('profile', compact('student'));
    }

    // Update Profile Data
    public function update(Request $request)
    {
        if (!Session::has('student_id')) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
    
        $student = Student::find(Session::get('student_id'));
    
        if (!$student) {
            return redirect()->route('login')->with('error', 'Student not found.');
        }
    
        // Validation
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'skill' => 'required|string',
            'role' => 'required|string',
            'age' => 'required|integer|min:1',
            'address' => 'required|string',
            'phone' => 'required|string',
            'githubuserid' => 'required|string',
            'password' => 'nullable|string|min:6|confirmed', // Added confirmation validation
        ]);
    
        // Update Student Data
        $student->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'skill' => $request->skill,
            'role' => $request->role,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
            'githubuserid' => $request->githubuserid,
            'password' => $request->password ? bcrypt($request->password) : $student->password, // Hash only if password is entered
        ]);
    
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    
}
