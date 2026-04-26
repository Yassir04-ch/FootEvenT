<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Notification;
use App\Service\EquipeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipeController extends Controller
{
    private $service;

    public function __construct(EquipeService $service)
    {
        $this->service = $service;
    }

     public function index()
    {
        $equipes = $this->service->getAll();
        $joueurcount = Joueur::count();
        return view('equipe.index', compact('equipes','joueurcount'));
    }

     public function create()
    {
        $tournois = $this->service->tournoiEnattente();
         return view('equipe.create',compact('tournois'));
    }

     public function store(EquipeRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image');
        }

        $user = Auth::user();
        $capitan_id = $user->id;
        $result = $this->service->create($validated,$user);
        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('equipes.index')->with('success', $result['message']);
    }


    public function joueurs(Equipe $equipe)
    {
        $equipe = $this->service->show($equipe);
        $joueursActifs = $this->service->getJoueursActifs($equipe);
        $joueursEnAttente = $this->service->getJoueursEnAttente($equipe);

        $isActif = false;
        $isEnAttente = false;

        if (Auth::check()) {
            $joueur = Auth::user()->joueur;
            if ($joueur) {
                $isActif = $joueur->activeJoueur();
                $isEnAttente = $joueur->equipes()->where('equipe_id', $equipe->id)->wherePivot('statut', 'en_attente')->exists();
            }
        }

        return view('equipe.joueurs', compact('equipe', 'joueursActifs', 'joueursEnAttente', 'isActif', 'isEnAttente'));
    }


    public function show(Equipe $equipe)
    {
        $tournois = $this->service->equipeTournois($equipe);
        $equipe = $this->service->show($equipe);
        $joueurs = $equipe->joueurs()->wherePivot('statut','actif')->get();
        $isActif = false;
        $isEnAttente = false;
        if (Auth::check()) {
        $user = Auth::user();
        $joueur = $user->joueur;
        if ($joueur) {
            $isActif = $joueur->activeJoueur();
            $isEnAttente = $joueur->equipes()->where('equipe_id', $equipe->id)
                ->wherePivot('statut', 'en_attente')->exists();
         }
      }
        return view('equipe.show', compact('equipe','tournois','joueurs','isEnAttente'));
    }
    

     public function edit(Equipe $equipe)
    {
        return view('equipe.update', compact('equipe'));
    }

 
    public function update(UpdateEquipeRequest $request,Equipe $equipe)
    {
        $validated = $request->validated();
        $userid =  Auth::id();
        if($request->hasFile('image')){
            $validated['image'] = $request->file('image');
        }

        $result = $this->service->update($validated,$equipe,$userid);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('equipes.show', $equipe)->with('success', $result['message']);
    }


     public function destroy(Equipe $equipe)
    {
        $userid =  Auth::id();
        $result = $this->service->delete($equipe,$userid);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('equipes.index')->with('success', $result['message']);
    }

    public function validerJoueur(Equipe $equipe, Joueur $joueur)
    {
        $result = $this->service->validerJoueur($equipe, $joueur);
        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }
        return back()->with('success', $result['message']);
    }


    public function refuserJoueur(Equipe $equipe, Joueur $joueur)
    {
        $result = $this->service->refuserJoueur($equipe, $joueur);
        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }
        return back()->with('success', $result['message']);
    }


    public function retireJoueur(Equipe $equipe,Joueur $joueur)
    {
        $result = $this->service->retireJoueur($equipe,$joueur);
        if(!$result['success']){
            return back()->with('error', $result['message']);
        }
          return back()->with('success', $result['message']);
        
    }

    public function games(Equipe $equipe)
    {
        $user_id = Auth::id();
        $games = $this->service->games($equipe);
        $notifications = Notification::where('user_id',$user_id)->orwhere('user_id',null)->get();
        return view('equipe.games',compact('games','equipe','notifications'));
    }

}