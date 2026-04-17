<?php

namespace App\Service;
use App\Repositories\OrganisateurRepoqitory;
use App\Models\Tournoi;
use App\Models\User;
 
class OrganisateurService
{

  private $repository;

  public function __construct(OrganisateurRepoqitory $repository){
    $this->repository = $repository;
  }

  public function Tournois(User $organisateur){
    $tournois = $this->repository->Tournois($organisateur);
    return $tournois;
  }

  public function organisateurMatchs($organisateur){
    
  }

}