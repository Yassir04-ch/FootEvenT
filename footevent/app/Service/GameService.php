<?php

namespace App\Service;
use App\Repositories\GameRepository;
use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Tournoi;
use App\Models\Notification;

class GameService
{
    protected $repository;

    public function __construct(GameRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createGame(array $data,Tournoi $tournoi)
    {

        $equipe1 = Equipe::find($data['equipe1_id']);
        $equipe2 = Equipe::find($data['equipe2_id']);
        $joueursE1 = $equipe1->joueurs()->get();
        $joueursE2 = $equipe2->joueurs()->get();
        $data['tournoi_id'] = $tournoi->id;
        
        if ($data['equipe1_id'] === $data['equipe2_id']) {
            return ['success' => false,'message' => 'une équipe ne peut pas jouer contre elle même.'];
        }
        $data['statut'] = 'programme';
        $this->repository->create($data);
        
        foreach($joueursE1 as $joueur){

            Notification::create([
                'message'=>"Un match a été programmé Votre equipe vs  " . $equipe2->name_equipe ." dans Tournoi : ".$tournoi->name_tournoi,
                'user_id'=>$joueur->user->id
            ]);
        }

         foreach($joueursE2 as $joueur){

            Notification::create([
                'message'=>"Un match a été programmé Votre equipe vs  " . $equipe1->name_equipe ." dans Tournoi : ".$tournoi->name_tournoi,
                'user_id'=>$joueur->user->id
            ]);
        }


        return ['success' => true,'message' => 'équipe a été crée'];


    }

    public function getAllGames(Request $request)
    {
        $games = $this->repository->all($request);
        return $games;
    }

    public function gamesProgramme(){
        $gamepro = $this->repository->gamesProgramme();
        return $gamepro;
    }

    public function gamestermine(){
        $gamepro = $this->repository->gamestermine();
        return $gamepro;
    } 
    
    public function gamesencour(){
        $gamepro = $this->repository->gamesencour();
        return $gamepro;
    }

    public function demarerGame($game){
        $this->repository->UpdateStatut($game,'en_cours');
    }

   
}