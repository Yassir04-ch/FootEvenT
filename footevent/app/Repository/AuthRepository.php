<?php

namespace App\Repository;

use App\Models\Role;
use App\Models\User;

class AuthRepository
{
    public function getRoles()
    {
        return Role::where('name', '!=', 'Administrateur')->get();
    }

    public function createUser(array $data): User
    {
        return User::create($data);
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
    
}