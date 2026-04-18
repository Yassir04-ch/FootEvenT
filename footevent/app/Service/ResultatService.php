<?php
namespace App\Service;
use App\Repositories\ResultatRepository;
use App\Models\Resultat;
use App\Models\Game;

class ResultatService{
    private $repository;
    public function __construct(ResultatRepository $repository){
        $this->repository = $repository;
    }

    public function getAll(){
        $resultats = $this->repository->getAll();
        return $resultats;
    }

    public function create(array $data,Game $game){
        $result = $this->repository->create($data);
        $game->update(['statut'=>'termine']);
        return $result;
    }
}