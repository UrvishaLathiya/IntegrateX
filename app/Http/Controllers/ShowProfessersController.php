<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacementOfficer;
use Illuminate\Support\Facades\Hash;


class ShowProfessersController extends Controller
{
    public function showOfficers()
    {
        // Fetch all placement officers
        $officers = PlacementOfficer::all();

        // Count total placement officers (if they are same as professors)
        $totalOfficers = $officers->count();

        return view('Admin.showOfficers', compact('officers', 'totalOfficers'));
    }

    public function deleteOfficer($id)
    {
        $officer = PlacementOfficer::find($id);

        if ($officer) {
            $officer->delete();
            return response()->json(['success' => true, 'message' => 'Officer deleted successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Officer not found!'], 404);
    }


    public function register(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'officer_name' => 'required|string|max:255',
                'email' => 'required|email|unique:placement_officers,email',
                'phone' => 'required|string|max:15',
                'role' => 'required|string|max:50',
                'password' => 'required|min:8',
            ]);

            // Insert data into database
            PlacementOfficer::create([
                'officer_name' => $request->officer_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            // Return JSON success response
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Return JSON error response
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    public function searchOfficers(Request $request)
    {
        $query = $request->search;

        $officers = PlacementOfficer::where('officer_name', 'LIKE', "%{$query}%")->get();

        $output = '';

        foreach ($officers as $officer) {
            $output .= '
                <tr>
                    <td>'.$officer->id.'</td>
                    <td>'.$officer->officer_name.'</td>
                    <td>'.$officer->email.'</td>
                    <td>'.$officer->phone.'</td>
                    <td>'.$officer->role.'</td>
                </tr>
            ';
        }

        return response($output);
    }


}
