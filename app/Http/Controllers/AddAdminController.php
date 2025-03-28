<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;

class AddAdminController extends Controller
{
    public function showAddAdmin()
    {
        // Check if admin is logged in
        if (!session()->has('admin')) {
            return redirect()->route('adminLogin')->with('error', 'Please log in first.');
        }

        return view('Admin.addNewAdmin');
    }

    public function storeAdmin(Request $request)
    {
        // Validate input
        $request->validate([
            'userName' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        // Create new admin
        Admin::create([
            'name' => $request->userName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('adminIndex')->with('success', 'New admin added successfully!');
    }
}
