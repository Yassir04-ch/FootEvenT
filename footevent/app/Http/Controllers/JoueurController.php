<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\Equipe;
use App\Models\Tournoi;
use App\Models\Game;
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
        $chek = Equipe::where('capitaine_id',$user->id)->exists();
        $active = $user->joueur->equipes()->wherePivot('statut','actif')->exists();
        $equipe = $joueur->equipes()->wherePivot('statut', 'actif')->with('tournois')->first();
        if($equipe){
          $games = Game::with(['equipes','resultat'])->whereHas('equipes',function($q) use ($equipe) {
            $q->where('equipe_id',$equipe->id);})->where('statut','programme')->get();
          
        }
        else{
            $games = null;  
        }
        $notifications = $this->service->getNotifications(Auth::id());
        return view('joueur.index', compact('joueur', 'user','chek','equipe','active','notifications','tournois','games'));
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
     public function store(JoueurRequest $request)
    {
        $validated = $request->validated();
        $result = $this->service->createJoueur($validated);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('joueurs.index')->with('success', $result['message']);
    }

    
    public function show(Joueur $joueur)
    {
        
    }

    public function edit(Joueur $joueur){
        return view('joueur.update',compact('joueur'));
    }
    
    public function update(Request $request, Joueur $joueur)
    {
        $validated = $request->validate([
             'poste' => "required|string",
             'age'  => "required|integer",
        ]);
        $this->service->update($validated,$joueur);
        return redirect()->route('joueurs.index')->with('success','votre profile joueur a été modifier');
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

    public function quitterEquipe(Equipe $equipe)
    {
       $user = Auth::user();
       $joueur = $user->joueur;
       $this->service->quitterEquipe($joueur, $equipe);
       return redirect()->route('equipes.index')->with('success', "Vous avez quitte équipe");
    }

    public function joueurs(Request $request ){
       $joueurs = $this->service->joueurs($request);
       return view('joueur.joueurs',compact('joueurs'));
    }

}
