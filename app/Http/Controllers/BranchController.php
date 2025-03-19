<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    // ✅ Show all branches
    // ✅ Show all branches
    public function index()
    {
        $branches = Branch::all(); // Fetch all branches
        return view('placementofficer.branches', compact('branches'));
    }

    // ✅ Store a new branch
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:branches,branch_name',
        ]);

        $branch = new Branch();
        $branch->branch_name = $request->name; // Ensure this matches the DB column
        $branch->save();

        return redirect()->back()->with('success', 'Branch added successfully!');
    }
}

