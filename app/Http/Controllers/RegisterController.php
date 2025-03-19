<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Branch; 

class RegisterController extends Controller
{
    // Show register page
    public function showRegister()
    {
        $branches = Branch::all(); // Fetch all branches from database
        return view('register', compact('branches')); // Pass branches to Blade view
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
        'year' => 'required|string',
        'branch_id' => 'required|exists:branches,id', // Fix field name
        'placement_status' => 'required|in:Not Placed,Shortlisted,Placed',
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
        'year' => $validatedData['year'],
        'branch_id' => $validatedData['branch_id'], // Fix field name
        'placement_status' => $validatedData['placement_status'],
    ]);

    return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
}

    public function showRegisterForm()
    {
        $branches = Branch::all(); // Fetch all branches
        return view('register', compact('branches')); // Pass branches to the view
    }
    // Show login page
    public function showLogin()
    {
        return view('login');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('placement_id'); // Remove session
        $request->session()->flush(); // Clear all session data
        $request->session()->regenerateToken(); // Regenerate token for security

        return redirect('/placement/login'); // Redirect to placement login
    }
}
