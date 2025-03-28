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

    public function showBranchesForAdmin()
    {
        $branches = Branch::all();
        return view('Admin.showBranches', compact('branches'));
    }
    // ✅ Store a new branch
    public function store(Request $request)
{
    $request->validate([
        'branch_name' => 'required|unique:branches,branch_name',
    ]);

    $branch = new Branch();
    $branch->branch_name = $request->branch_name; // Match input name
    $branch->save();

    return response()->json(['success' => true, 'branch' => $branch]);
}

}

