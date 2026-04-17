<?php

namespace App\Service;
use App\Repositories\GameRepository;
use Illuminate\Http\Request;

class GameService
{
    protected $repository;

    public function __construct(GameRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createGame(array $data)
    {
        if ($data['equipe1_id'] === $data['equipe2_id']) {
            return ['success' => false,'message' => 'une équipe ne peut pas jouer contre elle même.'];
        }
        $data['statut'] = 'programme';
        $this->repository->create($data);
        return ['success' => true,'message' => 'équipe a été crée'];


    }

    public function getAllGames(Request $request)
    {
        $games = $this->repository->all($request);
        return $games;
    }

   
}