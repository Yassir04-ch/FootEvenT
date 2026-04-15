<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Service\GameService;
use App\Models\Tournoi;

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
    public function index()
    {
        $games = $this->gameService->getAllGames();

        return view('games.index', compact('games'));
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
     public function store(GameRequest $request,Tournoi $tournoi)
    {
    
        $validated = $request->validated($tournoi);
        $validated['tournoi_id'] = $tournoi->id;
        $result = $this->gameService->createGame($validated);
        if(!$result['success']){
        return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->back()->with('success',$result['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
