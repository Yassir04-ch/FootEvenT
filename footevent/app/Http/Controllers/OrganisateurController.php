<?php

namespace App\Http\Controllers;
use App\Service\OrganisateurService;
use Illuminate\Support\Facades\Auth;

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
        // Load only validated teams
        $tournoi->equipesValidees = $tournoi->equipes()->wherePivot('statut', 'validee')->get();
         }
         return view('organisateur.tournois',compact('tournois'));
    }

    public function statistic(){

    }

    public function show(){

    }
}

