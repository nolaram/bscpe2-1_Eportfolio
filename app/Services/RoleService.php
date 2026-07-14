<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function getByName(string $name): Role
    {
        return Role::where('name', $name)
            ->firstOrFail();
    }
}