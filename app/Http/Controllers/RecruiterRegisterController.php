<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RecruiterRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('IndustryProfessionalModule.recruiterRegister'); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:recruiters,email',
            'company' => 'required|string|max:255',
            'company_website' => 'nullable|url',
            'linkedin_profile' => 'nullable|url',
            'industry' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:6|confirmed',
        ]);

        $recruiter = Recruiter::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'company_website' => $request->company_website,
            'linkedin_profile' => $request->linkedin_profile,
            'industry' => $request->industry,
            'role' => $request->role,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('recruiter')->login($recruiter);

        return redirect()->route('recruiter.login')->with('success', 'Registration successful');
    }
}
