<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'firstname' => 'Sneha',
                'lastname' => 'Kalathiya',
                'role' => 'Student',
                'age' => 22,
                'address' => 'Surat',
                'phone' => '9876543210',
                'githubuserid' => 'snehakalathiya',
                'email' => 'sneha@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'firstname' => 'Rahul',
                'lastname' => 'Sharma',
                'role' => 'Developer',
                'age' => 24,
                'address' => 'Ahmedabad,',
                'phone' => '9876543211',
                'githubuserid' => 'rahulsharma',
                'email' => 'rahul@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'firstname' => 'Priya',
                'lastname' => 'Patel',
                'role' => 'Designer',
                'age' => 23,
                'address' => 'Mumbai',
                'phone' => '9876543212',
                'githubuserid' => 'priyapatel',
                'email' => 'priya@gmail.com',
                'password' => Hash::make('123456'),
            ],
        ]);
    }
}
