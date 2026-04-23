<?php

namespace App\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\Tournoi;
use App\Models\Equipe;
use App\Models\Notification;
use App\Repositories\TournoiRepository;
use Illuminate\Http\Request;

class TournoiService
{
    private $repository;

    public function __construct(TournoiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(Request $request)
    {
        $tournois = $this->repository->getAll($request);
        return $tournois;
    }

    public function show(Tournoi $tournoi)
    {
        $tournoi = $this->repository->findById($tournoi);
        return $tournoi;

    }

    public function create( $validated, $userId) 
    {
        $validated['user_id'] = $userId;
        $tournoi = $this->repository->create($validated);
        Notification::create([
          'message'=>'Nouveau tournoi est disponible',
        ]);
        $message = 'Tournoi crée avec succès.';

        return ['message' => $message,'tournoi' => $tournoi];
    }

    public function update( $validated, Tournoi $tournoi, $user_id) 
    {
         if ($tournoi->user_id !== $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        if ($tournoi->status != 'en_attent') {
            return ['success' => false, 'message' => 'Impossible midifier une tournoi en cours ou terminer.'];
        }

        $tournoi = $this->repository->update($tournoi, $validated);
        return ['success' => true, 'message' => 'Tournoi mis à jour avec succès.', 'tournoi' => $tournoi];
    }

    public function delete(Tournoi $tournoi) 
    {
        $user = Auth::user();
        if ($user->role->name == 'Administrateur') {
            $this->repository->delete($tournoi);
            return ['success' => true,'message' => 'Tournoi supprimé avec succès'];

            Notification::create([
                'message'=>"Administrateur est supprimer votre tournoi  ".$tournoi->name_tournoi,
                'user_id'=>$equipe->capitaine_id
            ]);
        }

        if ($tournoi->user_id == $user->id) {
            $this->repository->delete($tournoi);
            return ['success' => true,'message' => 'Tournoi supprimé avec succès'];
        }
        return ['success' => false,'message' => 'Action non autorisée'];

    }

    public function joinTournoi(Tournoi $tournoi, $equipe_id, $user_id)
    {
        $equipe = Equipe::find($equipe_id);

        if (!$equipe) {
            return ['success' => false, 'message' => 'équipe introuvable.'];
        }

         if ($equipe->capitaine_id !== $user_id) {
            return ['success' => false, 'message' => 'seul le capitaine peut inscrire équipe.'];
        }

         if ($tournoi->status !== 'en_attente') {
            return ['success' => false, 'message' => 'ce tournoi ne accepte plus inscriptions.'];
        }

         $dejajoin = $equipe->tournois()->where('tournoi_id', $tournoi->id)->exists();
        if ($dejajoin) {
            return ['success' => false, 'message' => 'Votre équipe est déja inscrite dans ce tournoi.'];
        }

         $nbEquipes = $tournoi->equipes()->wherePivot('statut', 'validee')->count();
        if ($nbEquipes >= $tournoi->nbEquipes) {
            return ['success' => false, 'message' => 'Le tournoi est complet.'];
        }
 
        $this->repository->joinTournoi($tournoi, $equipe);

        return ['success' => true, 'message' => "Demande dinscription envoyée avec succès"];

    }
    
    public function validerEquipe(Tournoi $tournoi,Equipe $equipe,$user_id)
    {
        if ($tournoi->user_id != $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }
        $niveau = "groupe";
        if($tournoi->nbEquipes == 16){
            $niveau = "huitieme";
        }
        elseif($tournoi->nbEquipes == 8){
            $niveau = "quart";
        }
         elseif($tournoi->nbEquipes == 4){
            $niveau = "demi";
        }

        $tournoi_id = $tournoi->id;
        $this->repository->validerEquipe($equipe,$tournoi_id,$niveau);
        $notification  =  Notification::create([
          'message'=>"Votre équipe  " .$equipe->name_equipe ."  a été acceptée dans le tournoi  " . $tournoi->name_tournoi,
          'user_id'=>$equipe->capitaine_id
        ]);
        return ['success' => true, 'message' => 'Équipe validée avec succès.'];
    }

    public function refuserEquipe(Tournoi $tournoi,Equipe $equipe,$user_id)
    {
         if ($tournoi->user_id != $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }
        $tournoi_id = $tournoi->id;
        $this->repository->refuserEquipe($equipe,$tournoi_id);

        Notification::create([
          'message'=>"Votre équipe  " .$equipe->name_equipe ." a été Refusee dans le tournoi  " . $tournoi->name_tournoi,
          'user_id'=>$equipe->capitaine_id
        ]);

        return ['success' => true, 'message' => 'Équipe refusée.'];
    }

    public function getEquipesValidees(Tournoi $tournoi)
    {
        return $this->repository->getEquipesValidees($tournoi);
    }

    public function getEquipesEnAttente(Tournoi $tournoi)
    {
        return $this->repository->getEquipesEnAttente($tournoi);
    }

    public function demarerTournoi(Tournoi $tournoi){
        $equipes = $tournoi->equipes()->wherePivot('statut','validee')->count();
        if($tournoi->status == 'en_cours'){
            return['success'=>false , 'message'=>'tournoi est en cours'];
        }
        if($tournoi->status == 'termine'){
            return['success'=>false , 'message'=>'tournoi est déja terminée'];
        }
        if($tournoi->nbEquipes > $equipes){
            return['success'=>false , 'message'=>'Le nombre des équipes est pas complet'];
        }

        $this->repository->demarerTournoi($tournoi);
        return['success'=>true,'message'=>'tournoi en cours'];

    }

     public function terminerTournoi(Tournoi $tournoi){
        if($tournoi->status == 'termine'){
            return['success'=>false , 'message'=>'tournoi est déja terminée'];
        }
    
        $this->repository->terminerTournoi($tournoi);
        return['success'=>true,'message'=>'tournoi est terminée'];

    }

    public function eliminerEquipe(){
       
    }


}