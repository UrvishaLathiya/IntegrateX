<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Models\Branch;

class StudentController extends Controller
{
    public function showStudents()
    {
        $students = Student::with('branch')->get(); // Eager load branch relationship
        $branches = Branch::all();
        
        return view('Admin.showStudents', compact('students', 'branches'));
    }
    public function register(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|unique:students,email',
                'phone' => 'required|string|max:15',
                'age' => 'required|integer|min:1',
                'role' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'password' => 'required|min:8',
                'githubuserid' => 'nullable|string',
                'branch_id' => 'required|exists:branches,id', // Fix field name
                'placement_status' => 'required|in:Not Placed,Shortlisted,Placed',
            ]);

            // Insert data into database
            Student::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'age' => $request->age,
                'role' => $request->role ?? 'student', // Ensure 'role' is set
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'githubuserid' =>  $request->githubuserid,
                'year' =>  $request->year,
                'branch_id' =>  $request->branchid, // Fix field name
                'placement_status' => $request->placementstatus,
                    ]);

            // Return JSON success response
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Return JSON error response
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function searchStudents(Request $request)
    {
        $query = $request->search;

        $students = Student::where('firstname', 'LIKE', "%{$query}%")
                           ->orWhere('lastname', 'LIKE', "%{$query}%")
                           ->get();

        $output = '';

        foreach ($students as $student) {
            $output .= '
                <tr>
                    <td>'.$student->id.'</td>
                    <td>'.$student->firstname.' '.$student->lastname.'</td>
                    <td>'.$student->email.'</td>
                    <td>'.$student->phone.'</td>
                    <td>'.$student->age.'</td>
                    <td>'.$student->address.'</td>
                </tr>
            ';
        }

        return response($output);
    }
    public function filterStudents(Request $request)
{
    $status = $request->placement_status;

    if ($status) {
        $students = Student::where('placement_status', $status)->with('branch')->get();
    } else {
        $students = Student::with('branch')->get();
    }

    $output = '';

    foreach ($students as $student) {
        $output .= '
            <tr>
                <td>'.$student->id.'</td>
                <td>'.$student->firstname.'</td>
                <td>'.$student->lastname.'</td>
                <td>'.$student->email.'</td>
                <td>'.$student->phone.'</td>
                <td>'.$student->age.'</td>
                <td>'.$student->address.'</td>
                <td>'.$student->role.'</td>
                <td>'.$student->githubuserid.'</td>
                <td>'.$student->year.'</td>
                <td>'.$student->branch->branch_name.'</td> <!-- Display branch name -->
                <td>'.$student->placement_status.'</td>
            </tr>
        ';
    }

    return response($output);
}


}
