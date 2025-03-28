<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusRecruitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruiter_id', 'officer_id', 'company_profile', 'job_role', 
        'remuneration', 'location', 'requirements', 'interview_process'
    ];

    public function recruiter() {
        return $this->belongsTo(Recruiter::class);
    }

    public function officer() {
        return $this->belongsTo(PlacementOfficer::class);
    }
}
