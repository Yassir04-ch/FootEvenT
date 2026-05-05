<?php

namespace App\Service;

use App\Repositories\AuthRepository;
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
        $chekuser = $this->repository->findByEmail($validated['email']);
        if($chekuser){
            return ['success' => false,'message'=>'Email est déja existe'];
        }
        $user = $this->repository->createUser($validated);
        Auth::login($user);
        return ['success' => true, 'user' => $user];
    }

    public function login($credentials , $request)
    {
        if (!Auth::attempt($credentials)) {
            
            return ['success' => false, 'message' => 'Email ou mot de passe incorrect.'];
        }
        
        $request->session()->regenerate();  
        $user = Auth::user();
       if ($user->status_account == "banni") {
            Auth::logout();
            return ['success'=>false , "message"=>'Votre Compte est bloqué'];
        }
        $role = $user->role->name;
        return ['success' => true, 'role' => $role];
    }

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
    }

    
}