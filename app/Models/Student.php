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
    ];
    protected $hidden = [
        'password',
    ];
    public function skillSubsets()
{
    return $this->belongsToMany(SkillSubset::class, 'student_skills');
}
}
