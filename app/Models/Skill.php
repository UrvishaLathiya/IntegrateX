<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subsets()
{
    return $this->hasMany(SkillSubset::class, 'skill_id');
}

    public function studentSkills()
    {
        return $this->hasMany(StudentSkill::class);
    }
}
