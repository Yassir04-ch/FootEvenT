<?php

namespace App\Http\Controllers;
use App\Service\ResultatService;
use App\Models\Resultat;
use App\Models\Game;
use Illuminate\Http\Request;

class ResultatController extends Controller
{

   private $service;

   public function __construct(ResultatService $service){
     $this->service = $service;
   }
    
    public function index()
    {
        $resultats = $this->service->getAll();
        return view('result.index',compact('resultats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Game $game)
    {
      return view('resultat.create',compact('game'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Game $game)
    {
      $validated = $request->validate([
        'scoreEq1' => 'required|integer',
        'scoreEq2' => 'required|integer',
        ]);
        $id_equipe1 = $game->equipe1_id;
        $id_equipe2 = $game->equipe2_id;
        $validated['game_id'] = $game->id;
        $this->service->create($validated,$game,$id_equipe1,$id_equipe2);
        return redirect()->route('organisateur.matchs')->with('success','Résultat ajouter');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultat $resultat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultat $resultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultat $resultat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultat $resultat)
    {
        //
    }
}
