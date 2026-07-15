<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'role_id' => 3,
            'name' => 'Test Student',
            'email' => 'student@iskolarngbayan.pup.edu.ph',
            'password' => Hash::make('student'),
        ]);

        Student::create([
            'user_id' => $user->id,
            'student_number' => '2026-00001',
            'first_name' => 'Test',
            'last_name' => 'Student',
        ]);
    }
}
