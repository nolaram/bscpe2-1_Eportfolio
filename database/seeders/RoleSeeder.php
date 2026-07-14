<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert
        ([
            [
                'name'=> 'Admin',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'=> 'Adviser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Student',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
