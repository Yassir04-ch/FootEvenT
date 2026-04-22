<?php
namespace App\Repositories; 
use Illuminate\Http\Request;
use App\Models\Game;

class GameRepository
{
    
        
    public function all(Request $request)
    {
        $games = Game::with(['tournoi', 'equipes','resultat']);

        if ($request->has('statut')) {
            $games->where('statut', $request->statut);
        }
        return $games->get();
    }

    public function create(array $data)
    {
        $game = Game::create($data);
        return $game;
    }

    public function gamesbystatut($statut){
      $gameprog = Game::Where('statut',$statut)->get();
      return $gameprog;
    }


    public function UpdateStatut(Game $game,$statut){
        $game->update(['statut'=>$statut]);
    }
}