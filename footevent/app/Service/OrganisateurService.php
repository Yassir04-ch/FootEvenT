<?php

namespace App\Service;
use App\Models\Tournoi;
 
class OrganisateurService
{

  public function Tournois($organisateur){
    $tournois = $organisateur->tournois()->with('equipes')->get();
    return $tournois;
  }

}