<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Recruiter extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'company',
        'company_website',
        'linkedin_profile',
        'industry',
        'role',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
