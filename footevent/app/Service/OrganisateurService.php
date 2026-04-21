<?php

namespace App\Service;
use App\Repositories\OrganisateurRepository;
use App\Models\Tournoi;
use App\Models\User;
use App\Models\Notification;
 
class OrganisateurService
{

  private $repository;

  public function __construct(OrganisateurRepository $repository){
    $this->repository = $repository;
  }

  public function Tournois(User $organisateur){
    $tournois = $this->repository->Tournois($organisateur);
    return $tournois;
  }

  public function organisateurMatchs($organisateur){
    $games = $this->repository->organisateurMatchs($organisateur);
    return $games;
  }

  public function getNotifications($user_id){
     $notifications = Notification::where('user_id',$user_id)->orWhere('user_id',null)->get();
     return $notifications;
  }

}