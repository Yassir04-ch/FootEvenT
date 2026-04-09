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

    public function getByTournoi($tournoi_id)
    {
         $equipes = Equipe::with(['capitaine', 'joueurs'])->where('tournoi_id', $tournoi_id)->get();
         return $equipes;

    }

    public function getByStatut($statut)
    {
        $equipes = Equipe::with(['tournois', 'capitaine'])->where('statut', $statut)->get();
        return $equipes;
    }

     public function checkJoueur(Joueur $joueur, Equipe $equipe)
    {
        $chek = $equipe->joueurs()->where('user_id', $joueur->user_id)->exists();
        return $check;

    }


    public function UserActiveInEquipe(User $user)
    {
        $check = $user->joueur->equipes()->wherePivot('statut', 'actif')->exists();
        return $check;
    }

    public function ajouterJoueur(User $user, Equipe $equipe)
    {
        $equipe->joueurs()->attach($user->joueur->id, ['statut' => 'actif']);
    }

    public function equipeTournois(Equipe $equipe){
       $tournois =  $equipe->tournois->where('pivot.statut', 'validee');
       return $tournois;
    }
}