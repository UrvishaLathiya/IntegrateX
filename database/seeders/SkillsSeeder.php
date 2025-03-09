<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    public function run()
    {
        // Insert Main Skills (Avoid Duplicates)
        $programming = DB::table('skills')->updateOrInsert(['name' => 'Programming'], ['name' => 'Programming']);
        $frontend = DB::table('skills')->updateOrInsert(['name' => 'Frontend'], ['name' => 'Frontend']);
        $backend = DB::table('skills')->updateOrInsert(['name' => 'Backend'], ['name' => 'Backend']);
        $dsa = DB::table('skills')->updateOrInsert(['name' => 'DSA'], ['name' => 'DSA']);
        $versionControl = DB::table('skills')->updateOrInsert(['name' => 'Version Control'], ['name' => 'Version Control']);

        // Fetch Skill IDs
        $skills = DB::table('skills')->pluck('id', 'name');

        // Insert Subset Skills
        DB::table('skill_subsets')->insertOrIgnore([
            // Programming Subsets
            ['skill_id' => $skills['Programming'], 'name' => 'C'],
            ['skill_id' => $skills['Programming'], 'name' => 'C++'],
            ['skill_id' => $skills['Programming'], 'name' => 'Java'],
            ['skill_id' => $skills['Programming'], 'name' => 'Python'],

            // Frontend Subsets
            ['skill_id' => $skills['Frontend'], 'name' => 'HTML'],
            ['skill_id' => $skills['Frontend'], 'name' => 'CSS'],
            ['skill_id' => $skills['Frontend'], 'name' => 'JavaScript'],
            ['skill_id' => $skills['Frontend'], 'name' => 'React'],
            ['skill_id' => $skills['Frontend'], 'name' => 'Vue'],

            // Backend Subsets
            ['skill_id' => $skills['Backend'], 'name' => 'Node.js'],
            ['skill_id' => $skills['Backend'], 'name' => 'Laravel'],
            ['skill_id' => $skills['Backend'], 'name' => 'Django'],
            ['skill_id' => $skills['Backend'], 'name' => 'Spring Boot'],

            // DSA Subsets
            ['skill_id' => $skills['DSA'], 'name' => 'Arrays'],
            ['skill_id' => $skills['DSA'], 'name' => 'Linked Lists'],
            ['skill_id' => $skills['DSA'], 'name' => 'Graphs'],
            ['skill_id' => $skills['DSA'], 'name' => 'Trees'],

            // Version Control Subsets
            ['skill_id' => $skills['Version Control'], 'name' => 'Git'],
            ['skill_id' => $skills['Version Control'], 'name' => 'GitHub'],
            ['skill_id' => $skills['Version Control'], 'name' => 'GitLab'],
            ['skill_id' => $skills['Version Control'], 'name' => 'Bitbucket'],
        ]);
    }
}
