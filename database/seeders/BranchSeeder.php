<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    public function run()
    {
        DB::table('branches')->insert([
            ['branch_name' => 'CS'],
            ['branch_name' => 'ME'],
            ['branch_name' => 'BE'],
            ['branch_name' => 'BCA'],
            ['branch_name' => 'MCA']
        ]);
    }
}

