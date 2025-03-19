<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Skill;
use App\Models\Branch;

class StudentPlacementController extends Controller
{
    public function index(Request $request)
    {
        // Get filter options
        $years = Student::distinct()->pluck('year');
        $branches = Branch::all();
        $skills = Skill::all();
    
        // Query students with optional filters
        $students = Student::with(['skills', 'skillSubsets', 'branch'])
            ->when($request->year, function ($query, $year) {
                return $query->where('year', $year);
            })
            ->when($request->branch_id, function ($query, $branch_id) {
                return $query->where('branch_id', $branch_id);
            })
            ->when($request->skill_id, function ($query, $skill_id) {
                return $query->whereHas('skills', function ($q) use ($skill_id) {
                    $q->where('skill_id', $skill_id);
                });
            })
            ->get();
    
        return view('placementofficer.student_placement', compact('students', 'years', 'branches', 'skills')); // ✅ Ensure correct path
    }
    
}
