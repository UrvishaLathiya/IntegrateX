<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'emailid' => 'required|email|unique:students,emailid',
            'password' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'skills' => 'required|string',           'role' => 'required|string',
            'age' => 'required|integer',
            'address' => 'required|string',
            'githubuserid' => 'nullable|string',
            'phone' => 'required|integer|max:10',
        ]);

        DB::table('students')->insert([
            'emailid' => $request->emailid,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'skills' => $request->skills,
            'role' => $request->role,
            'age' => $request->age,
            'address' => $request->address,
            'githubuserid' => $request->githubuserid,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/login')->with('success', 'Registration successful! You can now log in.');
        
    }
    public function login(Request $request)
    {
        $request->validate([
            'emailid' => 'required|email',
            'password' => 'required'
        ]);

        $student = DB::table('students')->where('emailid', $request->emailid)->first();

        if ($student && Hash::check($request->password, $student->password)) {
            Session::put('student_id', $student->id);
            Session::put('student_name', $student->firstname);
            return redirect('/home');
        }

        return back()->with('error', 'Invalid email or password');
    }

}
