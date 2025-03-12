<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Student;

class ProjectController extends Controller
{
    public function index()
    {
        // Get the student_id from session (set during login)
        
        $studentId = session('student_id');
    
        // If student_id is missing, redirect to login
        if (!$studentId) {
            return redirect()->route('login')->with('error', 'Please log in to view your projects.');
        }
    
        // Fetch only projects that belong to this student
        $projects = Project::where('student_id', $studentId)->get();
    
        return view('projects', compact('projects'));
    }
    

    
    
    public function store(Request $request)
{
    $request->validate([
        'project_name' => 'required',
        'frontend' => 'required',
        'backend' => 'required',
        'database' => 'required',
        'live_demo' => 'nullable|url',
        'description' => 'required',
    ]);

    // ✅ Debugging: Check if student_id is stored in session
    if (!session()->has('student_id')) {
        return redirect()->route('login')->with('error', 'Please log in to add a project.');
    }

    $studentId = session('student_id');

    // ✅ Debugging: If student_id is still NULL, show an error
    if (empty($studentId)) {
        return redirect()->route('projects.index')->with('error', 'Error: Student ID is missing.');
    }

    // Store the new project
    Project::create([
        'student_id' => $studentId, 
        'project_name' => $request->project_name,
        'frontend' => $request->frontend,
        'backend' => $request->backend,
        'database' => $request->database,
        'live_demo' => $request->live_demo,
        'description' => $request->description,
    ]);

    $student = Student::find($studentId);
    if ($student) {
        $student->project += 1;  // Manually increment
        $student->save();        // Save the updated count
    }
    

    return redirect()->route('projects.index')->with('success', 'Project added successfully!');
}

}



