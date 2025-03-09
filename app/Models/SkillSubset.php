<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSubset extends Model
{
    use HasFactory;
    protected $fillable = ['skill_subset_name', 'skill_id'];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
