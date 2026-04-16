<?php

namespace App\Repositories;
use App\Models\User;
use App\Models\Joueur;
use Illuminate\Http\Request;

class ProfileRepository
{
   public function UpdateProfileUser(User $user,array $data){
     $user->update($data);
     return $joueur;
   }

   public function UpdateJoueur(Joueur $joueur , array $data){
        $joueur->update($data);
        return $joueur;
   }
}