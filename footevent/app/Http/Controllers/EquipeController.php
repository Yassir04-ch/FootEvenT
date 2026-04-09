<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\Equipe;
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
        return view('equipe.index', compact('equipes'));
    }

     public function create()
    {
        $tournois = $this->service->tournoiEnattente();
         return view('equipe.create',compact('tournois'));
    }

     public function store(EquipeRequest $request)
    {
        $validated = $request->validated();
        $user =  Auth::user();
        $capitan_id = $user->id;
        $result = $this->service->create($validated,$capitan_id);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('equipes.index')->with('success', $result['message']);
    }


    public function show(Equipe $equipe)
    {
        $tournois = $this->service->equipeTournois($equipe);
         $equipe = $this->service->show($equipe);
        return view('equipe.show', compact('equipe','tournois'));
    }

     public function edit(Equipe $equipe)
    {
        return view('equipe.update', compact('equipe'));
    }

 
    public function update(UpdateEquipeRequest $request,Equipe $equipe)
    {
        $validated = $request->validated();
        $userid =  Auth::id();
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

 
     public function valider(Equipe $equipe)
    {
        $this->service->validerEquipe($equipe);
        return back()->with('success',"Equipe validée");
    }

     public function refuser(Equipe $equipe)
    {
        $this->service->refuserEquipe($equipe);
        return back()->with('success',"Equipe refusée");
    }

}