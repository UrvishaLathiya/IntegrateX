<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\StudentSkill;

class SkillController extends Controller
{
    // ✅ Show skills with previously selected ones checked
    public function index()
    {
        // Get student_id from session (simulate login)
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect()->route('login')->with('error', 'Please set a student first.');
        }

        $skills = Skill::with('subsets')->get();

        // Get selected skills for the student
        $selectedSkills = StudentSkill::where('student_id', $studentId)->pluck('skill_id')->toArray();
        $selectedSubSkills = StudentSkill::where('student_id', $studentId)->pluck('skill_subset_id')->toArray();

        return view('skill', compact('skills', 'selectedSkills', 'selectedSubSkills'));
    }

    // ✅ Save selected skills & sub-skills
    public function save(Request $request)
    {
        $request->validate([
            'skills' => 'array',
            'sub_skills' => 'array',
        ]);

        $studentId = session('student_id');

        if (!$studentId) {
            return redirect()->route('login')->with('error', 'Please set a student first.');
        }

        // Prevent duplicate entries by deleting old records
        StudentSkill::where('student_id', $studentId)->delete();

        // Save selected skills
        if ($request->has('skills')) {
            foreach ($request->skills as $skillId) {
                StudentSkill::create([
                    'student_id' => $studentId,
                    'skill_id' => $skillId,
                    'skill_subset_id' => null,
                ]);
            }
        }

        // Save selected sub-skills
        if ($request->has('sub_skills')) {
            foreach ($request->sub_skills as $subsetId) {
                $skillId = Skill::whereHas('subsets', function ($query) use ($subsetId) {
                    $query->where('id', $subsetId);
                })->value('id');

                StudentSkill::create([
                    'student_id' => $studentId,
                    'skill_id' => $skillId,
                    'skill_subset_id' => $subsetId,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Skills saved successfully!');
    }
}
