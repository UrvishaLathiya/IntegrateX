<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recruiter;
use Illuminate\Support\Facades\Hash;

class RecruiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recruiter::create([
            'name' => 'Ram',
            'email' => 'taglinehr@gmail.com',
            'company' => 'Tagline Infotech LLP',
            'company_website' => 'https://taglineinfotech.com/',
            'linkedin_profile' => 'https://www.linkedin.com/company/tagline-infotech3/',
            'industry' => 'Software Development',
            'role' => 'HR',
            'phone' => '9876543210',
            'password' => Hash::make('123456'),
        ]);
    }
}
