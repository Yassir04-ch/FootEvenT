<?php
namespace App\Repositories;
use App\Models\Tournoi;
use App\Models\Match;


class OrganisateurRepoqitory{

  public function Tournois($organisateur){
    $tournois = $organisateur->tournois()->with('equipes')->get();
    return $tournois;
  }

  public function organisateurMatchs($organisateur){
    
  }

   
}