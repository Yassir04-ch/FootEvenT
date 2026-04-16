<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class AuthRepository
{
    public function getRoles()
    {
        $role = Role::where('name', '!=', 'Administrateur')->get();
        return $role;
    }

    public function createUser(array $data)
    {
        $user = User::create($data);
        return $user;
    }

    public function findByEmail(string $email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }
    
}