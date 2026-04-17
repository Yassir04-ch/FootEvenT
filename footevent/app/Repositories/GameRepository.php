<?php
namespace App\Repositories; 
use Illuminate\Http\Request;
use App\Models\Game;

class GameRepository
{
    
        
    public function all(Request $request)
    {
        $games = Game::with(['tournoi', 'equipe1', 'equipe2','resultat']);

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
}