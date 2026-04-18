<?php
namespace App\Repositories;
use App\Models\Resultat;

class ResultatRepository {

   public function getAll(){
       $resultats = Resultat::with('game')->get();
       return $resultats;
   }

   public function create(array $data){
      $resultat = Resultat::create($data);
      return $resultat;
   }
}