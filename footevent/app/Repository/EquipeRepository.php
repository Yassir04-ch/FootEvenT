<?php

namespace App\Repository;

use App\Models\Equipe;
use App\Models\Tournoi;

class EquipeRepository
{
    public function getAll()
    {
        $equipes = Equipe::with(['tournois', 'capitaine', 'joueurs'])->get();
        return $equipes;
    }

    public function findById(Equipe $equipe)
    {
        $equipe = $equipe->load(['tournois', 'capitaine', 'joueurs', 'gamesAsEquipe1', 'gamesAsEquipe2']);
        return $equipe;
    }

      public function tournoiEnattente()
    {
         $tournois = Tournoi::where("status","en_attente")->get();
         return $tournois;
    }

    public function create($data)
    {
        return Equipe::create($data);
    }

    public function update(Equipe $equipe, $data)
    {
        $equipe->update($data);
        return $equipe;
    }

    public function delete(Equipe $equipe)
    {
        $equipe->delete();
    }


    public function validerEquipe(Equipe $equipe)
    {
        $equipe->update(['statut' => 'validee']);
        return $equipe;
    }

    public function refuserEquipe(Equipe $equipe)
    {
        $equipe->update(['statut' => 'refusee']);
        return $equipe;
    }


    public function getByTournoi($tournoi_id)
    {
         $equipes = Equipe::with(['capitaine', 'joueurs'])->where('tournoi_id', $tournoi_id)->get();
         return $equipes;

    }

    public function getByStatut($statut)
    {
        $equipes = Equipe::with(['tournoi', 'capitaine'])->where('statut', $statut)->get();
        return $equipes;
    }
}