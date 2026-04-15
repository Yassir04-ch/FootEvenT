<?php
namespace App\Repository; 
use App\Models\Game;

class GameRepository
{
    public function create(array $data)
    {
        $game = Game::create($data);
        return $game;
    }

    public function all()
    {
        $games = Game::with(['tournoi', 'equipe1', 'equipe2','resultat'])->get();
        return $games;
    }
}