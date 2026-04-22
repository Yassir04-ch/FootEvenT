<?php
namespace App\Service;
use App\Repositories\ResultatRepository;
use App\Models\Resultat;
use App\Models\Game;
use App\Models\Equipe;

class ResultatService{
    private $repository;
    public function __construct(ResultatRepository $repository){
        $this->repository = $repository;
    }

    public function getAll(){
        $resultats = $this->repository->getAll();
        return $resultats;
    }

    public function updateNiveau($niveau){
        $newNiveau = "";
        if($niveau == 'huitieme'){
            $newNiveau = 'quart';
        }
        else if($niveau == 'quart'){
            $newNiveau = 'demi';
        }

         else if($niveau == 'demi'){
            $newNiveau = 'finale';
        }
        else{
            $newNiveau = 'huitieme';
        }
        return $newNiveau;
    }

    public function create(array $data,Game $game,$id_equipe1,$id_equipe2){

        $equipe1 = Equipe::find($id_equipe1);
        $equipe2 = Equipe::find($id_equipe2);
        $equipe1pivot = $equipe1->tournois()->where('tournoi_id', $game->tournoi_id)->first();
        $equipe2pivot = $equipe2->tournois()->where('tournoi_id', $game->tournoi_id)->first();
        if($data['scoreEq1'] > $data['scoreEq2']){
         $niveau = $equipe1pivot->pivot->niveau;
         $newNiveau = $this->updateNiveau($niveau);
          $equipe1->tournois()->updateExistingPivot($game->tournoi->id, ['niveau' => $newNiveau]);
          $equipe2->tournois()->updateExistingPivot($game->tournoi->id, ['statut' => 'eliminate']);
        }
        else{
         if($data['penaltyE1'] > $data['penaltyE2']){
            $niveau = $equipe1pivot->pivot->niveau;
            $newNiveau = $this->updateNiveau($niveau);
            $equipe1->tournois()->updateExistingPivot($game->tournoi->id, ['niveau' => $newNiveau]);
            $equipe2->tournois()->updateExistingPivot($game->tournoi->id, ['statut' => 'eliminate']);
            }
         else if($data['penaltyE1'] == $data['penaltyE2']){
             return ['success'=>false , "message"=>"Les penalties ne peuvent pas être égaux"];
         }
         else{
                $niveau = $equipe2pivot->pivot->niveau;
                $newNiveau = $this->updateNiveau($niveau);
                $equipe2->tournois()->updateExistingPivot($game->tournoi->id, ['niveau' => $newNiveau]);
                $equipe1->tournois()->updateExistingPivot($game->tournoi->id, ['statut' => 'eliminate']);
             }

        }
        $this->repository->create($data);
        $game->update(['statut'=>'termine']);
        return ['success'=>true , "message"=>"Résultat ajouter"];

    }

}