<?php

namespace App\Service;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;
use App\Repositories\JoueurRepository;
use Illuminate\Support\Facades\Auth;

class JoueurService
{
    protected $repository;

    public function __construct(JoueurRepository $repository)
    {
        $this->repository = $repository;
    }

    public function joueurs(Request $request){
        $joueurs = $this->repository->getJoueurs($request);
        return $joueurs;
    }

    public function createJoueur(array $data)
    {
        $user = Auth::user();
 
        if ($this->repository->findById($user->id)) {
            return ['success' => false, 'message' => 'Vous avez déja un profil joueur.'];
        }

        $data['user_id'] = $user->id;

        $joueur = $this->repository->createJoueur($data);

        return ['success' => true, 'message' => 'Profil joueur créé avec succès.', 'joueur' => $joueur];
    }

    public function joinEquipe(Joueur $joueur, Equipe $equipe)
    {

      if ($joueur->activeJoueur()) {
            return ['success' => false, 'message' => 'Vous êtes déja dans une équipe active.'];
        }

        $check = $joueur->equipes()->where('equipe_id', $equipe->id)->wherePivot('statut', 'en_attente')->exists();

        if ($check) {
            return ['success' => false, 'message' => 'Vous avez déja une demande en attente pour cette équipe.'];
        }

         $joueur->equipes()->attach($equipe->id, ['statut' => 'en_attente']);

        return ['success' => true, 'message' => 'Demande envoyée avec succès.'];
    }

    public function quitterEquipe(Joueur $joueur, Equipe $equipe)
    {
        if($equipe->capitaine_id == $joueur->user->id){
            $capitaine = $equipe->joueurs()->wherePivot('statut','actif')->wherePivot('joueur_id','!=',$joueur->id)->first();
            $equipe->update(['capitaine_id'=>$capitaine->user->id]);
        }
        $joueur->equipes()->updateExistingPivot($equipe->id, ['statut' => 'left']);

         Notification::create([
          'message'=>"Joueur ". $joueur->user->firstname ." ".$joueur->user->lastname." est quitee votre Equipe",
          'user_id'=>$equipe->capitaine_id
        ]);
    }

}