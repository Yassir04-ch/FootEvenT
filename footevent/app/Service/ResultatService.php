<?php
namespace App\Service;
use App\Repositories\ResultatRepository;
use App\Models\Resultat;
use App\Models\Ranking;
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

    public function create(array $data, Game $game, $id_equipe1, $id_equipe2)
    {
        $equipe1 = Equipe::find($id_equipe1);
        $equipe2 = Equipe::find($id_equipe2);

        $tournoi = $game->tournoi;
        $tournoi_id = $tournoi->id;

        $equipe1pivot = $equipe1->tournois()->where('tournoi_id', $tournoi_id)->first();

        $equipe2pivot = $equipe2->tournois()->where('tournoi_id', $tournoi_id)->first();

        if (!$equipe1pivot || !$equipe2pivot) {
            return ['success' => false,'message' => 'équipe introuvable dans ce tournoi'];
        }

        $score1 = $data['scoreEq1'];
        $score2 = $data['scoreEq2'];

        if ($score1 > $score2) {
            $this->handleWinner($equipe1,$equipe2,$equipe1pivot,$tournoi_id,$game,$score1,$score2);
        }
        elseif ($score2 > $score1) {
            $this->handleWinner($equipe2,$equipe1,$equipe2pivot,$tournoi_id,$game,$score2,$score1);
        }
        else {
            $pen1 = $data['penaltyE1'];
            $pen2 = $data['penaltyE2'];

            if ($pen1 == $pen2) {
                return ['success' => false,'message' => 'les penalties ne peuvent pas étre égaux'];
            }

            if ($pen1 > $pen2) {
                $this->handleWinner($equipe1,$equipe2,$equipe1pivot,$tournoi_id,$game,$score1,$score2);
            } else {
                $this->handleWinner($equipe2,$equipe1,$equipe2pivot,$tournoi_id,$game,$score2,$score1);
            }
        }

        $this->updatePositions($tournoi_id);

        $this->repository->create($data);

        $game->update([
            'statut' => 'termine'
        ]);
        $equipevalide = $tournoi->equipes()->wherePivot('statut', 'validee')->count();
        if ($equipevalide == 1)
        {
            $equipe = $tournoi->equipes()->wherePivot('statut', 'validee')->first();
            $equipe->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'winner']);
            $tournoi->update(['status','termine']);
        }
         return ['success' => true,'message' => 'Résultat ajouté'];
    }


    private function handleWinner($winner,$loser,$winnerPivot,$tournoi_id,$game,$winnerScore,$loserScore)
    {
        $niveau = $winnerPivot->pivot->niveau;

        $newNiveau = $this->updateNiveau($niveau);

        $winner->tournois()->updateExistingPivot($tournoi_id, [
            'niveau' => $newNiveau
        ]);

        $loser->tournois()->updateExistingPivot($tournoi_id, [
            'statut' => 'eliminate'
        ]);

        $winner->games()->updateExistingPivot($game->id, [
            'winner' => true
        ]);

        $loser->games()->updateExistingPivot($game->id, [
            'winner' => false
        ]);

        $this->updateRanking($winner->id,$tournoi_id,$winnerScore,$loserScore,3);

        $this->updateRanking($loser->id,$tournoi_id,$loserScore,$winnerScore,0);
    }


    public function updateRanking($equipe_id,$tournoi_id,$gols,$goals_con,$points){
        $ranking = Ranking::where('equipe_id',$equipe_id)->where('tournoi_id',$tournoi_id)->first();
        $matchWin = 0;
        $matchlos = 0;
        if(!$ranking){
            Ranking::create([
                "equipe_id"=>$equipe_id,
                "tournoi_id"=>$tournoi_id
            ]);
        }
        else{
        if ($points == 3){
           $matchWin = $ranking->matchWin + 1;
         } elseif ($points == 0){
           $matchlos = $ranking->matchlos += 1;
         }
          $goals_scored = $ranking->goals_scored + $gols;
          $goals_conceded = $ranking->goals_conceded + $goals_con;
          $points = $ranking->points + $points;
        //   dd($goals_conceded);
            $ranking->update([
                'points'=>$points,
                'matchWin'=>$matchWin,
                'matchlos'=>$matchlos,
                'goals_scored'=>$goals_scored,
                'goals_conceded'=>$goals_conceded
            ]);
        }
    }

    public function updatePositions($tournoi_id)
    {
        $rankings = Ranking::where('tournoi_id', $tournoi_id)->orderByDesc('points')->orderByDesc('goals_scored')->get();
        foreach ($rankings as $index => $ranking) {
            $position = $index + 1;
            $ranking->update(['position'=>$position]);
        }
    }

}