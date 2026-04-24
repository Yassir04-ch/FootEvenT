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

    public function create(array $data, Game $game, $id_equipe1, $id_equipe2)
    {
        $equipe1 = Equipe::find($id_equipe1);
        $equipe2 = Equipe::find($id_equipe2);

        $tournoi = $game->tournoi;
        $tournoi_id = $tournoi->id;

        $equipe1pivot = $equipe1->tournois()->where('tournoi_id', $tournoi_id)->first();
        $equipe2pivot = $equipe2->tournois()->where('tournoi_id', $tournoi_id)->first();

        $score1 = $data['scoreEq1'];
        $score2 = $data['scoreEq2'];

        if ($score1 > $score2) {

            $niveau = $equipe1pivot->pivot->niveau;
            $newNiveau = $this->updateNiveau($niveau);

            $equipe1->tournois()->updateExistingPivot($tournoi_id, ['niveau' => $newNiveau]);

            $equipe2->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'eliminate']);
            $this->updateRanking($equipe1->id, $tournoi_id, $score1,3);
            $this->updateRanking($equipe2->id, $tournoi_id, $score2,0);
        }
        elseif ($score2 > $score1) {

            $niveau = $equipe2pivot->pivot->niveau;
            $newNiveau = $this->updateNiveau($niveau);

            $equipe2->tournois()->updateExistingPivot($tournoi_id, ['niveau' => $newNiveau]);

            $equipe1->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'eliminate']);

            $this->updateRanking($equipe1->id, $tournoi_id, $score1,0);
            $this->updateRanking($equipe2->id, $tournoi_id, $score2,3);
        }
        else {

            $pen1 = $data['penaltyE1'];
            $pen2 = $data['penaltyE2'];

            if ($pen1 == $pen2) {
                return ['success' => false, "message" => "Les penalties ne peuvent pas étre égaux"];
            }

            if ($pen1 > $pen2) {

                $niveau = $equipe1pivot->pivot->niveau;
                $newNiveau = $this->updateNiveau($niveau);

                $equipe1->tournois()->updateExistingPivot($tournoi_id, ['niveau' => $newNiveau]);

                $equipe2->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'eliminate']);

                $this->updateRanking($equipe1->id, $tournoi_id, $score1,3);
                $this->updateRanking($equipe2->id, $tournoi_id, $score2,0);

            } else {

                $niveau = $equipe2pivot->pivot->niveau;
                $newNiveau = $this->updateNiveau($niveau);

                $equipe2->tournois()->updateExistingPivot($tournoi_id, ['niveau' => $newNiveau]);

                $equipe1->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'eliminate']);

                $this->updateRanking($equipe1->id, $tournoi_id, $score1,0);
                $this->updateRanking($equipe2->id, $tournoi_id, $score2,3);
            }
        }
        $this->updatePositions($tournoi_id);
        $this->repository->create($data);
        $game->update(['statut' => 'termine']);

        dd($game);

        return ['success' => true, "message" => "Résultat ajouté"];
    }


    public function updateRanking($equipe_id,$tournoi_id,$gols,$points){
        $ranking = Ranking::where('equipe_id',$equipe_id)->where('tournoi_id',$tournoi_id)->first();
        if(!$ranking){
            Ranking::create([
                "equipe_id"=>$equipe_id,
                "tournoi_id"=>$tournoi_id
            ]);
        }
        else{
        if ($points == 3) {
            $ranking->matchWin += 1;
         } elseif ($points == 0) {
            $ranking->matchlos += 1;
         }
          $goals_scored = $ranking->goals_scored + $gols;
          $points = $ranking->points + $points;
            $ranking->update([
                'points'=>$points,
                'matchWin'=>$matchWin,
                'matchlos'=>$matchlos,
                'goals_scored'=>$goals_scored
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