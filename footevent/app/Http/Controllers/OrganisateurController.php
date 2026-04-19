<?php

namespace App\Http\Controllers;
use App\Service\OrganisateurService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Equipe;

class OrganisateurController extends Controller
{
  private $service;

  public function __construct(OrganisateurService $service){
     $this->service = $service;
  }

    public function index(){
      $organisateur = Auth::user();
      $tournoicount = $organisateur->tournois()->count();
      $tournoiencourcount = $organisateur->tournois()->where('status','en_cours')->count();
      $tournoienattentcount = $organisateur->tournois()->where('status','en_attente')->count();
      $tournoiterminecount = $organisateur->tournois()->where('status','termine')->count();
      
      $equipecount = Equipe::whereHas('tournois',function($q) use ($organisateur){
        $q->where('user_id',$organisateur->id);})->count();

      $equipeenattent = Equipe::whereHas('tournois',function($q) use ($organisateur){
        $q->where('user_id',$organisateur->id)->where('equipe_tournois.statut','en_attente');})->count();

        return view('organisateur.index',compact('tournoicount','tournoiencourcount','tournoienattentcount','tournoiterminecount','equipecount','equipeenattent'));
    }

    public function Tournois()
    {
         $organisateur = Auth::user();
         $tournois = $this->service->Tournois($organisateur);
         foreach ($tournois as $tournoi) {
         $tournoi->equipesValidees = $tournoi->equipes()->wherePivot('statut', 'validee')->get();
         }
         return view('organisateur.tournois',compact('tournois'));
    }
     
    public function matchsTournoi(Tournoi $tournoi)
    {
      $matchs = Game::where('tournoi_id',$tournoi->id)->get();
      return view('tournoi.matchs',compact('matchs'));
    }

    public function show(){
      echo "jjjj";
    }

    public function organisateurMatchs(){
      $organisateur = Auth::user();
      $games = $this->service->organisateurMatchs($organisateur);
      return view('organisateur.matchs',compact('games'));
    }
    
}

