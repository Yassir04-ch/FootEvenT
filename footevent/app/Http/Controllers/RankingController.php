<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Tournoi;
use Illuminate\Http\Request;
use App\Service\RankingService;

class RankingController extends Controller
{
    private RankingService $sevice;
        
    public function __construct(RankingService $service){
        $this->service = $service;
    }
   
    public function index(Request $request)
    {
        $tournois = Tournoi::all();
        $tournoi = $this->service->getTournoi($request);
        $rankings = $this->service->rankings($tournoi);
        return view('ranking.index',compact('tournois','rankings'));
    }

}
