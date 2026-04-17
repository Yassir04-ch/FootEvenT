<?php
namespace App\Service;
use App\Repositories\ResultatReposiroty;
use App\Models\Resultat;
use App\Models\Game;

class ResultatService{
    private $repository;
    public function __construct(ResultatReposiroty $repository){
        $this->repository = $repository;
    }

    public function getAll(){
        $resultats = $this->repository->getAll();
        return $resultats;
    }

    public function create(array $data,Game $game){
        $result = $this->repository->create($data);
        $game->update(['status'=>'termine']);
        return $result;
    }
}