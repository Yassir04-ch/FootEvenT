<?php

namespace App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Joueur;

class ProfileService {

    public function updateProfile(User $user,$validated){
     if (!Hash::check($validated['old_password'], $user->password)){
          return ['success'=>false,'message'=>'Votre mode passe est incorect'];
      }
      if($validated['password'] != $validated['cnf_password']){
          return ['success'=>false,'message'=>'le confirmation du mode passe ne correspond pas'];
      }
      if( empty($validated['password'])){
          $user->update([
              "firstname"=> $validated['firstname'],
              "lastname"=>$validated['lastname'],
              "email"=>$validated['email'],
          ]);
         return ['success'=>true,'message'=>'Votre profile a été Modifier pas password'];
        }
        
        $user->update([
              "firstname"=> $validated['firstname'],
              "lastname"=>$validated['lastname'],
              "email"=>$validated['email'],
              "password"=>$validated['password'],
        ]);

        return ['success'=>true,'message'=>'Votre profile a été Modifier'];

    }
}