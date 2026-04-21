<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Service\GameService;
use App\Models\Tournoi;
use App\Models\Equipe;

class GameController extends Controller
{

    private $service;


    public function __construct(GameService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $games = $this->service->getAllGames($request);
        $gamepro = $this->service->gamesProgramme()->count();
        $gameter = $this->service->gamestermine()->count();
        $gamecour = $this->service->gamesencour()->count();
        $countMatch = Game::count();
        return view('games.index', compact('games','gamepro','gameter','gamecour','countMatch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tournoi $tournoi)
    {
        $equipes =$tournoi->equipes()->wherePivot('statut','validee')->get();
        return view('games.create',compact('tournoi','equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request,Tournoi $tournoi)
    {
        $validated = $request->validate([
            'dateMatch' => 'required',
            'terrain' => 'required|string|max:255',
            'equipe1_id' => 'required|exists:equipes,id',
            'equipe2_id' => 'required|exists:equipes,id',
            'heure'=> 'required'
        ]);
        $result = $this->service->createGame($validated,$tournoi);
        if(!$result['success']){
        return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->back()->with('success',$result['message']);
    }

    public function demarerGame(Game $game){
      $this->service->demarerGame($game);
      return back()->with('success','Match est Démarer');
    }

    public function show(Game $game)
    {
        $game->load(['equipe1', 'equipe2', 'tournoi', 'resultat']);

        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        //
    }


    public function update(Request $request, Game $game)
    {
        //
    }

    public function destroy(Game $game)
    {
        //
    }
}
