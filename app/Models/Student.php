<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'branch_id',
        'placement_status',
        'year',
        'project',
    ];

    protected $hidden = ['password'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // ✅ Define relationship with StudentSkill (One-to-Many)
    public function studentSkills(): HasMany
    {
        return $this->hasMany(StudentSkill::class, 'student_id', 'id');
    }

    // ✅ Define relationship with Skills (Many-to-Many via student_skills)
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'student_skills', 'student_id', 'skill_id');
    }

    // ✅ Define relationship with SkillSubsets (Many-to-Many via student_skills)
    public function skillSubsets(): BelongsToMany
    {
        return $this->belongsToMany(SkillSubset::class, 'student_skills', 'student_id', 'skill_subset_id');
    }

    // ✅ Relationship with Projects
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'student_id', 'id');
    }

    // ✅ Automatically count projects for a student
    protected $appends = ['projects_count'];

    public function getProjectsCountAttribute()
    {
        return $this->projects()->count();
    }

    // ✅ Ensure the 'project' field is stored as an integer
    protected $casts = [
        'project' => 'integer',
    ];
}
