<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'role',
        'age',
        'address',
        'phone',
        'githubuserid',
        'email',
        'password',
        'branch_id', 'placement_status', 'year','project',
    ];
    protected $hidden = [
        'password',
    ];
    public function skillSubsets()
    {
        return $this->belongsToMany(SkillSubset::class, 'student_skills');
    }
    
    public function projects()
    {
        return $this->hasMany(Project::class, 'student_id', 'id');
    }
    protected $appends = ['projects_count'];

    public function getProjectsCountAttribute()
    {
        return $this->projects()->count();
    }
    protected $casts = [
        'project' => 'integer',
    ];
}
