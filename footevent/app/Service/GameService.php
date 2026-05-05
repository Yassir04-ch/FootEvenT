<?php

namespace App\Service;
use App\Repositories\GameRepository;
use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Tournoi;
use DateTime;
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
        $data['tournoi_id'] = $tournoi->id;
        $equipes = $data['equipes'];
        
        if(count($equipes)!= 2){
            return ['success' => false,'message' => 'Vous devez choisir  2 équipes.'];
        }
            
       
        if ($equipes[0] == $equipes[1]) {
            return ['success' => false,'message' => 'une équipe ne peut pas jouer contre elle même.'];
        }

        $equipe1 = Equipe::with('joueurs')->find($equipes[0]);
        $equipe2 = Equipe::with('joueurs')->find($equipes[1]);

        if(!$equipe1 || !$equipe2){
            return ['success'=>false,'message'=>'équipe non trouvée'];
        }

        $game = $this->repository->create([
            'dateMatch' => $data['dateMatch'],
            'heure' => $data['heure'],
            'terrain' => $data['terrain'],
            'tournoi_id' => $tournoi->id,
            'statut' => 'programme'
        ]);

        $game->equipes()->attach($equipes);
        
        foreach($equipe1->joueurs as $joueur){

            Notification::create([
                'message'=>"Un match a été programmé Votre equipe vs  " . $equipe2->name_equipe ." dans Tournoi : ".$tournoi->name_tournoi,
                'user_id'=>$joueur->user->id
            ]);
        }

         foreach($equipe2->joueurs as $joueur){

            Notification::create([
                'message'=>"Un match a été programmé Votre equipe vs  " . $equipe1->name_equipe ." dans Tournoi : ".$tournoi->name_tournoi,
                'user_id'=>$joueur->user->id
            ]);
        }


        return ['success' => true,'message' => 'Matche est crée'];


    }

    public function getAllGames(Request $request)
    {
        $games = $this->repository->all($request);
        return $games;
    }

    public function gamesbystatut($statut){
        $gamepro = $this->repository->gamesbystatut($statut);
        return $gamepro;
    }


    public function demarerGame($game){
        $matchDate = new DateTime($game->dateMatch . ' ' . $game->heure);
        $now = new DateTime();

        if ($now < $matchDate) {
            return ['success' => false,'message' => 'Match pas encore commencé'];
        }
        $this->repository->UpdateStatut($game,'en_cours');
    }

   
}