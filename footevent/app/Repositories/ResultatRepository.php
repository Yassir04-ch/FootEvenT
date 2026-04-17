<?php
namespace App\Repositories;
use App\Models\Resultat;

class ResultatReposiroty {

   public function getAll(){
       $resultats = Resultat::with('game')->get();
       return $resultats;
   }

   public function create(array $data){
     Resultat::create($data);
   }
}