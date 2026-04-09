<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\Equipe;
use App\Models\Tournoi;
use Illuminate\Http\Request;
use App\Service\JoueurService;
use App\Http\Requests\JoueurRequest;
use Illuminate\Support\Facades\Auth;


class JoueurController extends Controller
{
    
    private $service;

    public function __construct(JoueurService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $user = Auth::user();
        $joueur = $user->joueur;
        $tournois = Tournoi::where('status','en_attente')->take(3)->get();
        $equipe = $joueur->equipes()->wherePivot('statut', 'en_attente')->exists();
        return view('joueur.index', compact('joueur', 'user','equipe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("joueur.create");
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $validated = $request->validate([
            'poste' => "required|string|max:100",
            'age'  => "required|integer",
        ]);
        $result = $this->service->createJoueur($validated);

        if (!$result['success']) {
            return back()->with('error', $result['message'])->withInput();
        }

        return redirect()->route('equipes.index')->with('success', $result['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Joueur $joueur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joueur $joueur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joueur $joueur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joueur $joueur)
    {
        //
    }


    public function joinEquipe(Equipe $equipe)
    {
        $user = Auth::user();
        $joueur = $user->joueur;

        $result = $this->service->joinEquipe($joueur, $equipe);

        if ($result['success']) {
         return back()->with('success', $result['message']);
        }

         return back()->with('error', $result['message']);
    }

}
