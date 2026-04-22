<?php

namespace App\Http\Controllers;
use App\Service\ResultatService;
use App\Models\Resultat;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\ResultatRequest;


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
      $validated = $request->validated();
        $id_equipe1 = $game->equipe1_id;
        $id_equipe2 = $game->equipe2_id;
        $validated['game_id'] = $game->id;
         $result = $this->service->create($validated,$game,$id_equipe1,$id_equipe2);
        if(!$result['success']){
        return back()->with('error',$result['message']);
        }
        return redirect()->route('organisateur.matchs')->with('success',$result['message']);
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
