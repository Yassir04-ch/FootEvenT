<?php

namespace App\Service;

use App\Models\Equipe;
use App\Models\Tournoi;
use App\Models\Joueur;
use App\Repositories\EquipeRepository;

class EquipeService
{
    private $repository;

    public function __construct(EquipeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $equipes = $this->repository->getAll();
        return $equipes;
    }

    public function show(Equipe $equipe)
    {
        $equipe = $this->repository->findById($equipe);
        return $equipe;

    }

    public function getByTournoi(Tournoi $tournoi)
    {
        $equipes = $this->repository->getByTournoi($tournoi);
        return $equipes;
    }


    public function create($validated, $user)
    {
        $tournoi = Tournoi::find($validated['tournoi_id']);
        $capitane_id = $user->id;
        $joueur = $user->joueur;
        if (!$tournoi) {
            return ['success' => false, 'message' => 'Tournoi introuvable.'];
        }

        if ($tournoi->status !== 'en_attente') {
            return ['success' => false, 'message' => "Ce tournoi n'accepte pas d'inscriptions."];
        }

         $nbEquipes = $tournoi->equipes()->wherePivot('statut', 'validee')->count();
        if ($nbEquipes >= $tournoi->nbEquipes) {
            return ['success' => false, 'message' => 'Le nombre des equipes du tournoi est complet.'];
        }

        $capitane = $tournoi->equipes()->where('capitaine_id', $capitane_id)->exists();
        if ($capitane) {
            return ['success' => false, 'message' => 'Vous avez déjà une équipe dans ce tournoi.'];
        }

         $chekactif = $joueur->equipes()->wherePivot('statut', 'actif')->exists();

        if ($chekactif) {
            return ['success' => false, 'message' => 'Vous êtes déja active dans un équipe'];
        }
        dd($chekactif);
         $data = [
            'name_equipe'  => $validated['name_equipe'],
            'description'  => $validated['description'],
            'capitaine_id' => $capitane_id,
         ];
         $equipe = $this->repository->create($data);

         $equipe->tournois()->attach($validated['tournoi_id'], ['statut' => 'en_attente']);
         $joueur->equipes()->attach($equipe->id, ['statut' => 'actif']);
         
        return ['success' => true, 'message' => 'Equipe créée avec succès.', 'equipe' => $equipe];
    }

    public function tournoiEnattente(){
        $tournois = $this->repository->tournoiEnattente();
        return $tournois;
    }

    public function update( $validated, Equipe $equipe, $user_id)
    {
        if ($equipe->capitaine_id !== $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        if ($equipe->statut === 'validee') {
            return ['success' => false, 'message' => 'impossible de modifier une équipe validée.'];
        }

        $equipe = $this->repository->update($equipe, $validated);
        return ['success' => true, 'message' => 'Equipe est modifier.', 'equipe' => $equipe];
    }


    public function delete(Equipe $equipe, $user_id)
    {
        if ($equipe->capitaine_id !== $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        if ($equipe->statut === 'validee') {
            return ['success' => false, 'message' => 'Impossible de supprimer une équipe validée.'];
        }

        $this->repository->delete($equipe);
        return ['success' => true, 'message' => 'Equipe supprimée.'];
    }


     public function joinEquipe($joueur, Equipe $equipe)
    {
       
        if ($this->repository->checkJoueur($joueur, $equipe)) {
            return ['success' => false, 'message' => 'Vous êtes déjà dans cette équipe.'];
        }

        if ($this->repository->UserActiveInEquipe($joueur)) {
            return ['success' => false, 'message' => 'Vous êtes déjà actif dans une autre équipe.'];
        }

        $this->repository->ajouterJoueur($joueur, $equipe);

        return ['success' => true, 'message' => 'Vous avez rejoint équipe avec succès.'];
    }

    public function equipeTournois(Equipe $equipe){
       $tournois = $this->repository->equipeTournois($equipe);
       return $tournois;
    }

    public function validerJoueur(Equipe $equipe, Joueur $joueur)
    {
        $membre = $equipe->joueurs()->where('joueur_id', $joueur->id)->wherePivot('statut', 'en_attente')->exists();

        if (!$membre) {
            return ['success' => false, 'message' => 'Demande introuvable.'];
        }

        $this->repository->validerJoueur($equipe, $joueur);

        return ['success' => true, 'message' => 'Joueur validé avec succès.'];
    }

    public function refuserJoueur(Equipe $equipe, Joueur $joueur)
    {
        $membre = $equipe->joueurs()->where('joueur_id', $joueur->id)->exists();

        if (!$membre) {
            return ['success' => false, 'message' => 'Joueur introuvable.'];
        }

        $this->repository->refuserJoueur($equipe, $joueur);

        return ['success' => true, 'message' => 'Joueur refusé.'];
    }

    public function leftJoueur(Equipe $equipe, Joueur $joueur){
        $membre = $equipe->joueurs()->wher('joueur_id',$joueur->id)->exists();
          if (!$membre) {
            return ['success' => false, 'message' => 'Joueur introuvable.'];
        }
        $this->repository->leftJoueur($equipe, $joueur);
        return ['success' => true, 'message' => 'Joueur est left.'];

    }

    public function getJoueursActifs(Equipe $equipe)
    {
        return $this->repository->getJoueursActifs($equipe);
    }

    public function getJoueursEnAttente(Equipe $equipe)
    {
        return $this->repository->getJoueursEnAttente($equipe);
    }



}