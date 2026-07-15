<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Adviser;
use Illuminate\Support\Facades\Hash;

class AdviserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'role_id' => 2,
            'name' => 'OJT Adviser',
            'email' => 'adviser@iskolarngbayan.pup.edu.ph',
            'password' => Hash::make('adviser'),
        ]);

        Adviser::create([
            'user_id' => $user->id,
            'first_name' => 'OJT',
            'last_name' => 'Adviser',
            'department' => 'Computer Engineering',
        ]);
    }
}
