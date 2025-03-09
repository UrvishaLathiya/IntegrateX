<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'skill_id', 'skill_subset_id'];
}
