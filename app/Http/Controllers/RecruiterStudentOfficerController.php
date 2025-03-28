<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacementOfficer;
use App\Models\Student;
use App\Models\Branch;
class RecruiterStudentOfficerController extends Controller
{
    public function showOfficers()
    {
        // Fetch all placement officers
        $officers = PlacementOfficer::all();

        // Count total placement officers (if they are same as professors)
        $totalOfficers = $officers->count();

        return view('IndustryProfessionalModule.recruiterShowOfficer', compact('officers', 'totalOfficers'));
    }
    public function showStudents()
    {
        $students = Student::with('branch')->get(); // Eager load branch relationship
        $branches = Branch::all();
        
        return view('IndustryProfessionalModule.recruiterShowStudent', compact('students', 'branches'));
    }
}
