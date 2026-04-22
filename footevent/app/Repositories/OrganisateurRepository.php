<?php
namespace App\Repositories;
use App\Models\Tournoi;
use App\Models\Game;


class OrganisateurRepository{

  public function Tournois($organisateur){
    $tournois = $organisateur->tournois()->with('equipes')->get();
    return $tournois;
  }

  public function organisateurMatchs($organisateur){
     $games = Game::with(['tournoi', 'equipes'])->whereHas('tournoi', function ($query) use ($organisateur){
            $query->where('user_id', $organisateur->id);})->get();
      return $games ;       
  }

   
}