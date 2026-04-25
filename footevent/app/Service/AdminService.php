<?php

namespace App\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Equipe;
use App\Models\Notification;

class AdminService {

  public function banniUser(User $user){
    if($user->status_account == 'banni'){
        return ['success'=>false,'message'=>'compte est déja banni'];
    }
    if($user->role->name == 'Administrateur'){
        return ['success'=>false,'message'=>'impossible  banni un  Administrateur'];
    }
     $user->update(['status_account'=>'banni']);
     return ['success'=>true,'message'=>'compte est banni'];
  }

  public function activeUser(User $user){
    
    if($user->status_account == 'active'){
        return ['success'=>false,'message'=>'compte est déja active'];
    }
    $user->update(['status_account'=>'active']);
    return ['success'=>true,'message'=>'compte est active'];
  }

  public function getNotifications($user_id){
     $notifications = Notification::where('user_id',$user_id)->orwhere('user_id',null)->get();
     return $notifications;
  }

  public function equipes()
  {
       $equipes = Equipe::with('capitaine')->take(4)->get();
       return $equipes;
  }

}