<?php

namespace App\Service;

use App\Models\Tournoi;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingService
{
    public function getTournoi(Request $request)
    {
      if($request->has('id')){
        $tournoi = Tournoi::find($request->id);
        return $tournoi;
      }
      $tournoi = Tournoi::first();
      return $tournoi;
    }


    public function rankings($tournoi)
    {
        $rankings = Ranking::with('equipe')->
        where('tournoi_id',$tournoi->id)->orderby('position')->get();
        return $rankings;
    }
}