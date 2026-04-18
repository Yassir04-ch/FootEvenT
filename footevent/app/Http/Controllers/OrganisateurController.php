<?php

namespace App\Http\Controllers;
use App\Service\OrganisateurService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrganisateurController extends Controller
{
  private $service;

  public function __construct(OrganisateurService $service){
     $this->service = $service;
  }

    public function index(){
        return view('organisateur.index');
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

