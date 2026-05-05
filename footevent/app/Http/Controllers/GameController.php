<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Service\GameService;
use App\Models\Tournoi;
use App\Models\Equipe;

class GameController extends Controller
{

    private GameService $service;


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
        $gamepro = $this->service->gamesbystatut('programme')->count();
        $gameter = $this->service->gamesbystatut('termine')->count();
        $gamecour = $this->service->gamesbystatut('en_cours')->count();
        $countMatch = Game::count();
        // dd($games);
        return view('games.index', compact('games','gamepro','gameter','gamecour','countMatch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tournoi $tournoi)
    {
        $equipes = $tournoi->equipes()->wherePivot('statut','validee')->get();
        return view('games.create',compact('tournoi','equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(GameRequest $request,Tournoi $tournoi)
    {
        $validated = $request->validated();
        $result = $this->service->createGame($validated,$tournoi);
        if(!$result['success']){
        return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->back()->with('success',$result['message']);
    }

    public function demarerGame(Game $game)
    {
     $result = $this->service->demarerGame($game);
      if(!$result['success']){
      return back()->with('error',$result['message']);
      }
      return back()->with('success',$result['message']);
    }

    public function show(Game $game)
    {
        $game->load(['equipes', 'tournoi', 'resultat']);

        return view('games.show', compact('game'));
    }

   public function edit(Game $game)
    {
        if ($game->statut !== 'programme') {
            return redirect()->route('games.index')->with('error', 'Ce match ne peut pas étre modifié');
        }

        return view('games.update', compact('game'));
    }

    public function update(GameUpdateRequest $request, Game $game)
    {
        if ($game->statut !== 'programme') {
            return back()->with('error', 'Ce Match ne peut pas étre modifié');
        }

        $validated = $request->validated();

        $game->update([
            'dateMatch' => $validated['dateMatch'],
            'heure' => $validated['heure'],
            'terrain' => $validated['terrain'],
        ]);

        return redirect()->back()->with('success', 'Match modifié avec succès');
    }

}
