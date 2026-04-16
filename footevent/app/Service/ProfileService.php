<?php

namespace App\Service;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Joueur;

class ProfileService {
    private $repository;
    public function __construct(ProfileRepository $repository){
      $this->repository = $repository;
    }

    public function updateProfile(User $user,Joueur $joueur ,$validated){
      $datauser = [];
      $datauser['firstname'] = 
      $this->rapository->UpdateProfileUser($user,$datauser);
    }
}