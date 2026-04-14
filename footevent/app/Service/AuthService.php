<?php

namespace App\Service;

use App\Repository\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    private $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getRoles()
    {
        return $this->repository->getRoles();
    }

    public function register($validated)
    {
        $validated['password'] = bcrypt($validated['password']);
        $user = $this->repository->createUser($validated);
        Auth::login($user);

        return ['success' => true, 'user' => $user];
    }

    public function login($credentials)
    {
        if (!Auth::attempt($credentials)) {
            return ['success' => false, 'message' => 'Email ou mot de passe incorrect.'];
        }
        $user = Auth::user();
        if($user->status_account == "banni"){
            return ['success'=>false , "message"=>'Votre Compte est bloqué'];
        }
        $role = $user->role->name;
        return ['success' => true, 'role' => $role];
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    
}