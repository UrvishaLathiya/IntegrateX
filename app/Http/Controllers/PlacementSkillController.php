<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\SkillSubset;
use App\Models\Student;
use App\Models\StudentSkill;

class PlacementSkillController extends Controller
{
    // ✅ Show all skills and sub-skills
    public function index()
    {
        $skills = Skill::with('subsets')->get();
        return view('placementofficer.assign-skill', compact('skills'));
    }

    // ✅ Store a new skill
    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:skills,name',
        ]);

        Skill::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    // ✅ Store a new sub-skill
    public function storeSubSkill(Request $request)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'name' => 'required|unique:skill_subsets,name,NULL,id,skill_id,' . $request->skill_id,
        ]);
    
        SkillSubset::create([
            'skill_id' => $request->skill_id,
            'name' => $request->name,
        ]);
    
        return redirect()->back()->with('success', 'Sub-skill added successfully!');
    }
    

    // ✅ Assign skill to student
    public function assignSkill(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'skill_id' => 'required|exists:skills,id',
            'subset_id' => 'nullable|exists:skill_subsets,id',
        ]);

        // ✅ Ensure skill_subset_id can be null
        $subsetId = $request->subset_id ?? null;

        // ✅ Prevent duplicate assignments
        $exists = StudentSkill::where('student_id', $request->student_id)
            ->where('skill_id', $request->skill_id)
            ->where('skill_subset_id', $subsetId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Skill already assigned to student!');
        }

        // ✅ Assign skill
        StudentSkill::create([
            'student_id' => $request->student_id,
            'skill_id' => $request->skill_id,
            'skill_subset_id' => $subsetId,
        ]);

        return redirect()->back()->with('success', 'Skill assigned successfully!');
    }
}
