<?php

namespace App\Service;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Repositories\JoueurRepository;
use Illuminate\Support\Facades\Storage;
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
        if($data['image']){
            $data['image'] = $data['image']->store('joueurs','public');
        }

        $data['user_id'] = $user->id;

        $joueur = $this->repository->createJoueur($data);

        return ['success' => true, 'message' => 'Profil joueur créé avec succès.', 'joueur' => $joueur];
    }

     public function update(array $data,Joueur $joueur)
    {

        if($joueur->image && Storage::disk('public')->exists($joueur->image)){
            Storage::disk('public')->delete($joueur->image);
        }
        $data['image'] = $data['image']->store('joueurs','public');
        $joueur->update($data);
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
         $nbJoueurActif = $equipe->joueurs()->wherePivot('statut','actif')->count();
        if($nbJoueurActif <=1){
          return ['success'=>false,'message'=>"Il est impossible de quitter équipe s'il ne reste qu'un seul joueur."];
         }
        if($equipe->capitaine_id == $joueur->user->id){
            $capitaine = $equipe->joueurs()->wherePivot('statut','actif')->wherePivot('joueur_id','!=',$joueur->id)->first();
            $newnbjoueur = $equipe->nbJoueur - 1;
            $equipe->update(['capitaine_id'=>$capitaine->user->id,'nbJoueur'=>$newnbjoueur]);
        }
        $joueur->equipes()->updateExistingPivot($equipe->id, ['statut' => 'left']);
         Notification::create([
          'message'=>"Joueur ". $joueur->user->firstname ." ".$joueur->user->lastname." est quitee votre Equipe",
          'user_id'=>$equipe->capitaine_id
        ]);

        return['success'=>false,'message'=>'Vous avez quitte équipe'];
    }

    public function getNotifications($user_id){
     $notifications = Notification::where('user_id',$user_id)->orwhere('user_id',null)->get();
     return $notifications;
  }

}