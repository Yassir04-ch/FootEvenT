<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournoiRequest;
use App\Http\Requests\UpdateTournoiRequest;
use App\Models\Tournoi;
use App\Models\Equipe;
use App\Models\Game;
use App\Service\TournoiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournoiController extends Controller
{
    private $service;

    public function __construct(TournoiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {

        $tournois = $this->service->getAll($request);
        $countTour = Tournoi::count();
        $countEqui = Equipe::count();
        $countMatch = Game::count();
        return view('tournoi.index', compact('tournois','countTour','countEqui','countMatch'));
    }

     public function create()
    {
        return view('tournoi.create');
    }
 
    public function store(StoreTournoiRequest $request)
    {
        $organisateur_id = Auth::id();
        $validated = $request->validated();
        $result = $this->service->create($validated,$organisateur_id);
        return redirect()->route('tournois.index')->with('success', $result['message']);
    }

    public function equipes(Tournoi $tournoi){
        $equipes = $tournoi->equipes()->get();
        return view('tournoi.equipes',compact('tournoi','equipes'));
    }

    public function show(Tournoi $tournoi)
    {
        $tournoi = $this->service->show($tournoi);

        $equipesValidees = $this->service->getEquipestournoi($tournoi);
        $equipesEnAttente = $this->service->getEquipesEnAttente($tournoi);

        $monEquipe = null;
        $dejaInscrit = false;
        $statutInscription = null;
        $user_id = Auth::id();
        if($tournoi->status == 'termine'){
            $winner = $tournoi->equipes()->wherePivot('statut','winner')->first();
        }
        else {
            $winner = null; 
        }


        if (Auth::check() && Auth::user()->role->name == 'Joueur') {
            $monEquipe = Equipe::where('capitaine_id',$user_id)->first();
            if ($monEquipe) {
                $inscription = $monEquipe->tournois()->where('tournoi_id', $tournoi->id)->first();
                if ($inscription) {
                $dejaInscrit = true;
                $statutInscription = $inscription->pivot->statut;
                } else {
                    $dejaInscrit = false;
                    $statutInscription = null;
                }
            }
        }

        return view('tournoi.show', compact('tournoi','equipesValidees','equipesEnAttente','monEquipe','dejaInscrit','statutInscription','winner'));
    }


    public function edit(Tournoi $tournoi)
    {
        return view('tournoi.update', compact('tournoi'));
    }


    public function update(UpdateTournoiRequest $request, Tournoi $tournoi)
    {
        $validated = $request->validated();
        $user_id = Auth::id();
        $result = $this->service->update($validated, $tournoi,$user_id);

        if(!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('tournois.show', $tournoi)->with('success', $result['message']);
    }


    public function destroy(Tournoi $tournoi)
    {
        $user = Auth::user();
        $result = $this->service->delete($tournoi);

        if (!$result['success']) {
            return redirect()->with('error', $result['message']);
        }
        if($user->role->name == 'Administrateur'){
         return back()->with('success', $result['message']);
        }

        if($user->role->name == 'Organisateur'){
         return redirect()->route('organisateurs.index')->with('success', $result['message']);
        }
    }

    public function joinTournoi(Tournoi $tournoi, Request $request)
    {
        $user_id =  Auth::id();
        $equipe_id = $request->equipe_id;
        $result = $this->service->joinTournoi($tournoi, $equipe_id,$user_id);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return back()->with('success', $result['message']);
    }

    public function validerEquipe(Tournoi $tournoi, Equipe $equipe)
    {
        $user_id =  Auth::id();
        $result = $this->service->validerEquipe($tournoi, $equipe,$user_id);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return back()->with('success', $result['message']);
    }

    public function refuserEquipe(Tournoi $tournoi,Equipe $equipe)
    {
        $user_id =  Auth::id();
        $result = $this->service->refuserEquipe($tournoi, $equipe,$user_id);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }
        return back()->with('success', $result['message']);
    }

    public function demarerTournoi(Tournoi $tournoi){
      $result = $this->service->demarerTournoi($tournoi);
      if(!$result['success']){
        return back()->with('error',$result['message']);
      }
        return back()->with('success',$result['message']);
    }
     public function terminerTournoi(Tournoi $tournoi){
      $result = $this->service->terminerTournoi($tournoi);
      if(!$result['success']){
        return back()->with('error',$result['message']);
      }
        return back()->with('success',$result['message']);
    }
 }