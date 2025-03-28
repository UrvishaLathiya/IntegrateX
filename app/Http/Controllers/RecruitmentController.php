<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\PlacementOfficer;
use App\Models\CampusRecruitment;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecruitmentMail;

class RecruitmentController extends Controller
{
    public function sendRecruitmentAlert(Request $request) {
        $request->validate([
            'officer_id' => 'required|exists:placement_officers,id',
            'company_profile' => 'required',
            'job_role' => 'required',
            'remuneration' => 'required|numeric',
            'location' => 'required',
            'requirements' => 'required',
            'interview_process' => 'required',
        ]);

        $recruiter = auth()->guard('recruiter')->user();

        if (!$recruiter) {
            return response()->json(['error' => 'Unauthorized: Recruiter not logged in'], 401);
        }

        // Save recruitment details in the database
        $recruitment = CampusRecruitment::create([
            'recruiter_id' => $recruiter->id,
            'officer_id' => $request->officer_id,
            'company_profile' => $request->company_profile,
            'job_role' => $request->job_role,
            'remuneration' => $request->remuneration,
            'location' => $request->location,
            'requirements' => $request->requirements,
            'interview_process' => $request->interview_process,
        ]);

        $officer = PlacementOfficer::find($request->officer_id);
        $recruitment->officer_name = $officer->officer_name;

        // Store notification in the database
        Notification::create([
            'placement_officer_id' => $request->officer_id,
            'message' => "New recruitment alert: {$request->job_role} at {$request->company_profile}",
            'is_read' => false,
        ]);

        // Send email notification
        Mail::to($officer->email)->send(new RecruitmentMail($recruitment, $officer->officer_name));

        return response()->json(['message' => 'Recruitment alert [Email + Notification] sent successfully!']);
    }
}
