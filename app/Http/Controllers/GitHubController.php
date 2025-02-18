<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class GitHubController extends Controller
{
    public function showRepos()
    {
        if (!Session::has('student_id')) {
            return redirect()->route('home')->with('error', 'Student not found');
        }

        $student = Student::find(Session::get('student_id'));
        
        if (!$student || !$student->githubuserid) {
            return redirect()->route('home')->with('error', 'GitHub ID not found');
        }

        $response = Http::get("https://api.github.com/users/{$student->githubuserid}/repos");
        
        if ($response->failed()) {
            return redirect()->route('home')->with('error', 'Failed to fetch GitHub repositories');
        }
        
        $repos = $response->json();

        return view('github', compact('repos', 'student'));
    }
}
