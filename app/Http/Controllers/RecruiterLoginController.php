<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RecruiterLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('IndustryProfessionalModule.recruiterLogin'); // Ensure you have 'resources/views/recruiter/login.blade.php'
    }

    public function indexPage()
    {
        $recruiter = session('recruiter');
        return view('IndustryProfessionalModule.recruiterIndex', compact('recruiter')); // Ensure you have 'resources/views/recruiter/login.blade.php'
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $recruiter = Recruiter::where('email', $request->email)->first();

        if ($recruiter && Hash::check($request->password, $recruiter->password)) {
            Auth::guard('recruiter')->login($recruiter);
            // Store recruiter details in session
            session(['recruiter' => $recruiter]);
            return redirect()->route('recruiter.index')->with('success', 'Login successful');
        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }



    // Logout
    public function logout()
    {
        Auth::guard('recruiter')->logout();
        return redirect()->route('recruiterLogin')->with('success', 'Logged out successfully');
    }
}
