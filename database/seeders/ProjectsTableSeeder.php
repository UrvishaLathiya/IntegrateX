<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Get students' IDs dynamically
        $sneha = DB::table('students')->where('email', 'sneha@gmail.com')->value('id');
        $rahul = DB::table('students')->where('email', 'rahul@gmail.com')->value('id');
        $priya = DB::table('students')->where('email', 'priya@gmail.com')->value('id');

        DB::table('projects')->insert([
            // Projects for Sneha
            [
                'student_id' => $sneha,
                'project_name' => 'IoT Smart Home',
                'frontend' => 'React',
                'backend' => 'Laravel',
                'database' => 'MySQL',
                'live_demo' => 'https://iot-home.example.com',
                'description' => 'A home automation system using IoT.',
            ],
            [
                'student_id' => $sneha,
                'project_name' => 'AI Chatbot',
                'frontend' => 'Vue.js',
                'backend' => 'Django',
                'database' => 'PostgreSQL',
                'live_demo' => 'https://chatbot.example.com',
                'description' => 'An AI chatbot for customer support.',
            ],

            // Projects for Rahul
            [
                'student_id' => $rahul,
                'project_name' => 'E-Commerce Website',
                'frontend' => 'Angular',
                'backend' => 'Spring Boot',
                'database' => 'MongoDB',
                'live_demo' => 'https://ecommerce.example.com',
                'description' => 'A fully functional e-commerce website.',
            ],
            [
                'student_id' => $rahul,
                'project_name' => 'Weather Forecast App',
                'frontend' => 'Flutter',
                'backend' => 'Node.js',
                'database' => 'Firebase',
                'live_demo' => 'https://weatherapp.example.com',
                'description' => 'A weather forecast application with real-time data.',
            ],

            // Projects for Priya
            [
                'student_id' => $priya,
                'project_name' => 'Portfolio Website',
                'frontend' => 'HTML, CSS, JavaScript',
                'backend' => 'PHP',
                'database' => 'SQLite',
                'live_demo' => 'https://portfolio.example.com',
                'description' => 'A personal portfolio website showcasing work.',
            ],
            [
                'student_id' => $priya,
                'project_name' => 'Task Management App',
                'frontend' => 'React Native',
                'backend' => 'Express.js',
                'database' => 'PostgreSQL',
                'live_demo' => 'https://taskapp.example.com',
                'description' => 'An application for managing personal tasks efficiently.',
            ],
        ]);
    }
}
