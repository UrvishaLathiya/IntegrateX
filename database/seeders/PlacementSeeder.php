<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OfficerSeeder extends Seeder
{
    public function run()
    {
        DB::table('officers')->insert([
            [
                'officer_name' => 'John Doe',
                'email' => 'john@example.com',
                'role' => 'Admin',
                'password' => Hash::make('12345678'), // Encrypt password
                'phone' => '9876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'officer_name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'role' => 'Manager',
                'password' => Hash::make('12345678'),
                'phone' => '9876543211',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'officer_name' => 'Robert Johnson',
                'email' => 'robert.johnson@example.com',
                'role' => 'Supervisor',
                'password' => Hash::make('12345678'),
                'phone' => '9876543212',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
