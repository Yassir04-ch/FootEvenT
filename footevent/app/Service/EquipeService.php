<?php

namespace App\Service;

use App\Models\Equipe;
use App\Models\Tournoi;
use App\Models\Joueur;
use App\Models\Notification;
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
        $capitane_id = $user->id;
        $joueur = $user->joueur;

         $chekactif = $joueur->equipes()->wherePivot('statut', 'actif')->exists();

        if ($chekactif) {
            return ['success' => false, 'message' => 'Vous êtes déja active dans un équipe'];
        }

        if ($validated['image']) {
             $validated['image'] = $validated['image']->store('equipes', 'public');
        }  

         $validated['capitaine_id'] = $capitane_id; 
         $equipe = $this->repository->create($validated);

        Notification::create([
          'message'=>'Nouveau Equipe '.$validated['name_equipe'].' est disponible',
        ]);

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

        if($validated['image']){
            if($equipe->image && Storage::disk('public')->exists($equipe->image)){
                Storage::disk('public')->delete($equipe->image);
            }
            $validated['image'] = $validated['image']->store('equipes','public');
        }

        $equipe = $this->repository->update($equipe, $validated);
        return ['success' => true, 'message' => 'Equipe est modifier', 'equipe' => $equipe];
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

        Notification::create([
          'message'=>"Vous avez été accepté dans équipe " . $equipe->name_equipe ,
          'user_id'=>$joueur->user->id
        ]);

        return ['success' => true, 'message' => 'Joueur validé avec succès.'];
    }

    public function refuserJoueur(Equipe $equipe, Joueur $joueur)
    {
        $membre = $equipe->joueurs()->where('joueur_id', $joueur->id)->exists();

        if (!$membre) {
            return ['success' => false, 'message' => 'Joueur introuvable.'];
        }

        $this->repository->refuserJoueur($equipe, $joueur);

        Notification::create([
          'message'=>"Vous avez été refusee dans équipe " . $equipe->name_equipe ,
          'user_id'=>$joueur->user->id
        ]);

        return ['success' => true, 'message' => 'Joueur refusé.'];
    }

    public function leftJoueur(Equipe $equipe, Joueur $joueur){
        $membre = $equipe->joueurs()->wher('joueur_id',$joueur->id)->exists();
          if (!$membre) {
            return ['success' => false, 'message' => 'Joueur introuvable.'];
        }
        $this->repository->leftJoueur($equipe, $joueur);

        Notification::create([
          'message'=>"Vous avez été retiré de équipe " . $equipe->name_equipe ." par organisateur",
          'user_id'=>$joueur->user->id
        ]);
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