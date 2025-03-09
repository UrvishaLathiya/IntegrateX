<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSkillsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('student_skills')->insert([
            ['student_id' => 1, 'skill_subset_id' => 1], // Sneha -> Laravel
            ['student_id' => 1, 'skill_subset_id' => 2], // Sneha -> React
            ['student_id' => 2, 'skill_subset_id' => 3], // Rahul -> Photoshop
            ['student_id' => 3, 'skill_subset_id' => 4], // Priya -> Figma
        ]);
    }
}
