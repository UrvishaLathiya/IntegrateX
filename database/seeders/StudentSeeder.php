<?php

namespace Database\Seeders;

use App\Models\Student; // Import the Student model
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::firstOrCreate(
            ['email' => 'john@example.com'], 
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'skill' => 'PHP',
                'role' => 'Developer',
                'age' => 25,
                'address' => '1234 Elm Street, Some City, Country',
                'phone' => '1234567890',
                'githubuserid' => 'johndoe',
                'password' => bcrypt('123'),
            ]
        );

        Student::firstOrCreate(
            ['email' => 'sneha.patel@example.com'], 
            [
                'firstname' => 'Sneha',
                'lastname' => 'Patel',
                'skill' => 'PHP',
                'role' => 'Engineer',
                'age' => 26,
                'address' => '456 Avenue, City',
                'phone' => '9876543211',
                'githubuserid' => 'snehakalathiya',
                'password' => bcrypt('1234'),
            ]
        );

        // Adding more records
        Student::firstOrCreate(
            ['email' => 'alice@example.com'], 
            [
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'skill' => 'JavaScript',
                'role' => 'Frontend Developer',
                'age' => 24,
                'address' => '789 Road, Another City',
                'phone' => '1122334455',
                'githubuserid' => 'urvishalathiya',
                'password' => bcrypt('5678'),
            ]
        );

        Student::firstOrCreate(
            ['email' => 'bob@example.com'], 
            [
                'firstname' => 'Bob',
                'lastname' => 'Brown',
                'skill' => 'Python',
                'role' => 'Data Scientist',
                'age' => 30,
                'address' => '987 Lane, Big City',
                'phone' => '5566778899',
                'githubuserid' => 'snehakalathiya',
                'password' => bcrypt('abcd'),
            ]
        );

        Student::firstOrCreate(
            ['email' => 'emma@example.com'], 
            [
                'firstname' => 'Emma',
                'lastname' => 'Wilson',
                'skill' => 'Java',
                'role' => 'Backend Developer',
                'age' => 28,
                'address' => '654 Street, Small Town',
                'phone' => '4433221100',
                'githubuserid' => 'dhruvsaidava',
                'password' => bcrypt('efgh'),
            ]
        );
    }
}
