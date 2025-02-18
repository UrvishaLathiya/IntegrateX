<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function updateProfile(Request $request)
{
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'skill' => 'nullable|string|max:255',
        'role' => 'nullable|string|max:255',
        'age' => 'required|integer|min:18',
        'address' => 'nullable|string|max:255',
        'phone' => 'required|string|max:15',
        'githubuserid' => 'nullable|string|max:255',
        'email' => 'required|string|email|max:255|unique:students,email,' . auth()->id(),
        'password' => 'nullable|string|min:8',
    ]);

    $student = auth()->user();

    $student->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'skill' => $request->skill,
        'role' => $request->role,
        'age' => $request->age,
        'address' => $request->address,
        'phone' => $request->phone,
        'githubuserid' => $request->githubuserid,
        'email' => $request->email,
        'password' => $request->password ? Hash::make($request->password) : $student->password,
    ]);
    
    return redirect()->route('student.profile')->with('success', 'Profile updated successfully!');
}
public function showProfile()
{
    $student = auth()->user(); // Get the logged-in student
    return view('myprofile', compact('student'));
}

}
