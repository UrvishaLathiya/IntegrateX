<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSkill extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'skill_id', 'skill_subset_id'];

    // ✅ Relationship with Student
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // ✅ Relationship with Skill
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    // ✅ Relationship with SkillSubset
    public function skillSubset(): BelongsTo
    {
        return $this->belongsTo(SkillSubset::class, 'skill_subset_id');
    }
}
