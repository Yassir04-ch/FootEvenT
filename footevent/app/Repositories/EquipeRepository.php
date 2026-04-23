<?php

namespace App\Repositories;

use App\Models\Equipe;
use App\Models\Tournoi;
use App\Models\Joueur;

class EquipeRepository
{
    public function getAll()
    {
        $equipes = Equipe::with(['tournois', 'capitaine', 'joueurs'])->get();
        return $equipes;
    }

    public function findById(Equipe $equipe)
    {
        $equipe = $equipe->load(['tournois', 'capitaine', 'joueurs', 'games']);
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

    public function validerJoueur(Equipe $equipe, Joueur $joueur)
    {
        $equipe->joueurs()->updateExistingPivot($joueur->id, ['statut' => 'actif']);

     }

     public function refuserJoueur(Equipe $equipe, Joueur $joueur)
    {

        $equipe->joueurs()->updateExistingPivot($joueur->id, ['statut' => 'refusee']);

     }

     public function leftJoueur(Equipe $equipe, Joueur $joueur){

      $equipe->joueurs()->updateExistingPivot($joueur->id,['status'=>'left']);
      
     }

    public function equipeTournois(Equipe $equipe){
       $tournois =  $equipe->tournois->where('pivot.statut', 'validee');
       return $tournois;
    }
    
    public function getJoueursActifs(Equipe $equipe)
    {
        return $equipe->joueurs()->wherePivot('statut', 'actif')->with('user')->get();
    }

    public function getJoueursEnAttente(Equipe $equipe)
    {
        return $equipe->joueurs()->wherePivot('statut', 'en_attente')->with('user')->get();
    }


}