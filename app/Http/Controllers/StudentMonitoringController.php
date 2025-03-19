<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentMonitoringController  extends Controller
{
    public function index()
    {
        // ✅ Fetch students with their skills
        $students = Student::with(['skillSubsets.skill'])->get();

        // Prepare data for chart
        $chartData = [];
        foreach ($students as $student) {
            $chartData[] = [
                'name' => $student->firstname . ' ' . $student->lastname,
                'skills' => $student->skillSubsets->pluck('name')->toArray(), // Get skill names
                'count' => $student->skillSubsets->count(), // Skill count
            ];
        }

        return view('placementofficer.showskill', compact('students','chartData'));
    }
    
}
