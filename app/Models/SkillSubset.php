<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSubset extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'skill_id'];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
    public function studentSkills()
    {
        return $this->hasMany(StudentSkill::class);
    }
}
