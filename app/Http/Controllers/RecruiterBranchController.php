<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class RecruiterBranchController extends Controller
{
    // Display all branches
    public function index()
    {
        $branches = Branch::all();
        return view('IndustryProfessionalModule.recruitershowbranch', compact('branches'));
    }

    // Store a new branch
    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|string|max:255',
        ]);

        $branch = Branch::create([
            'branch_name' => $request->branch_name,
        ]);

        return response()->json(['success' => true, 'branch' => $branch]);
    }
}
