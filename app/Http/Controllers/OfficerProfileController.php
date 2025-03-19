<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacementOfficer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OfficerProfileController extends Controller
{
    // ✅ Show the profile edit form
    public function edit()
    {
        // Get logged-in officer ID from session
        $officerId = session('officer_id');

        if (!$officerId) {
            return redirect()->route('officerlogin')->with('error', 'Please log in first.');
        }

        // Fetch officer details
        $officer = PlacementOfficer::find($officerId);

        if (!$officer) {
            return redirect()->route('officerlogin')->with('error', 'Officer not found.');
        }

        return view('PlacementOfficer.update-profile', compact('officer'));
    }

    // ✅ Handle profile update
    public function update(Request $request)
    {
        // Get logged-in officer ID from session
        $officerId = session('officer_id');

        if (!$officerId) {
            return redirect()->route('officerlogin')->with('error', 'Please log in first.');
        }

        $officer = PlacementOfficer::find($officerId);

        if (!$officer) {
            return redirect()->route('officerlogin')->with('error', 'Officer not found.');
        }

        // Validate form data
        $request->validate([
            'officer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:placement_officers,email,' . $officerId,
            'phone' => 'required|string|max:15',
            'role' => 'required|string|max:50',
            'password' => 'nullable|min:8',
        ]);

        // Update profile
        $officer->update([
            'officer_name' => $request->officer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $officer->password,
        ]);

        return redirect()->route('officer.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
