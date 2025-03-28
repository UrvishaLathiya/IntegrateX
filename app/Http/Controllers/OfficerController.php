<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacementOfficer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Notification;

class OfficerController extends Controller
{
    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('PlacementOfficer.officerregister');
    }

    // Handle Registration
    public function register(Request $request)
    {
        $request->validate([
            'officer_name' => 'required|string|max:255',
            'email' => 'required|email|unique:placement_officers,email',
            'phone' => 'required|string|max:15',
            'role' => 'required|string|max:50',
            'password' => 'required|min:8',
        ]);

        PlacementOfficer::create([
            'officer_name' => $request->officer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Check if the request is AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('officerlogin')->with('success', 'Registration successful. Please log in.');
    }

    // Show Login Form
    public function showLoginForm()
    {
        return view('PlacementOfficer.officerlogin');
    }

    // Handle Login (Without Auth, Using Session)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $officer = PlacementOfficer::where('email', $request->email)->first();

        if (!$officer || !Hash::check($request->password, $officer->password)) {
            return back()->with('error', 'Invalid credentials, please try again.');
        }

        // Store officer details in session
        Session::put('officer_id', $officer->id);
        Session::put('officer_name', $officer->officer_name);
        Session::put('officer_email', $officer->email);
        Session::put('role', $officer->role);

        return redirect()->route('index')->with('success', 'Login successful!');
    }

    // Show Officer Profile
    public function profile()
    {
        if (!session()->has('officer_id')) {
            return redirect()->route('officerlogin')->with('error', 'Please log in first.');
        }

        $officer = PlacementOfficer::find(session('officer_id'));

        return view('PlacementOfficer.officerprofile', compact('officer'));
    }

    // Handle Logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('officerlogin')->with('success', 'Logged out successfully.');
    }

    // Show all notifications for the logged-in Placement Officer
    public function showNotifications()
    {
        $officerId = session('officer_id'); 

        if (!$officerId) {
            return redirect()->route('officerlogin')->with('error', 'Please log in first.');
        }

        $notifications = Notification::where('placement_officer_id', $officerId)
                                     ->latest()
                                     ->get();

        return view('PlacementOfficer.notifications', compact('notifications'));
    }

    // Mark a notification as read
    public function markAsRead($id)
    {
        $officerId = session('officer_id');

        if (!$officerId) {
            return redirect()->route('officerlogin')->with('error', 'Please log in first.');
        }

        $notification = Notification::where('id', $id)
                                    ->where('placement_officer_id', $officerId)
                                    ->firstOrFail();

        $notification->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    // Get the unread notification count dynamically
    public function getUnreadCount()
    {
        $officerId = session('officer_id');

        if (!$officerId) {
            return response()->json(['unreadCount' => 0]);
        }

        $unreadCount = Notification::where('placement_officer_id', $officerId)
                                   ->where('is_read', false)
                                   ->count();

        return response()->json(['unreadCount' => $unreadCount]);
    }
}
