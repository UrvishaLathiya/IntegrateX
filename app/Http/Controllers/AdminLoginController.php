<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin; // Ensure you have an 'Admin' model
use App\Models\Branch;
use App\Models\Student;
use App\Models\PlacementOfficer;
use App\Models\Skill;

class AdminLoginController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('Admin.adminLogin'); // Make sure this view exists
    }

    // Handle login process
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Find admin in the database
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store admin session
            Session::put('admin', $admin->email);
            return redirect()->route('adminIndex');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show Admin Dashboard
    public function adminIndex()
    {
        session_start(); 
        // Check if admin session exists
        if (!Session::has('admin')) {
            return redirect()->route('adminLogin')->with('error', 'Please log in first.');
        }

        // Retrieve admin details
        $admin = Admin::where('email', Session::get('admin'))->first();
         // Get total students count
        $totalStudents = Student::count();

        // Get total professors count
        $totalProfessors = PlacementOfficer::count();

        $totalBranchs = Branch::count();

        $totalSkills = Skill::count();

        return view('Admin.adminIndex', compact('admin', 'totalStudents', 'totalProfessors', 'totalBranchs', 'totalSkills')); // Pass admin data to view
    }

    // Logout admin
    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('adminLogin')->with('success', 'Logged out successfully');
    }
}
