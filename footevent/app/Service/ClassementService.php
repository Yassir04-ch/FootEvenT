<?php

namespace App\Service;
use App\Models\Tournoi;
use App\Models\Equipe;
use App\Models\Game;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClassementService {

    public function equipeNiveau(Request $request ,Tournoi $tournoi){
        $equipes = $tournoi->equipes()->with(['joueurs','capitaine'])->wherePivot('statut','!=','en_attente')->wherePivot('statut','!=','refusee');
        if($request->has('niveau')){
            $equipes->wherePivot('niveau',$request->niveau);
        }
        return $equipes->get();

    }

    public function equipeclassement(Request $request, Equipe $equipe)
    {
        $tournois = $equipe->tournois()->get();

        if ($request->has('id')) {
            $tournoi = $tournois->where('id', $request->id)->first();
        } else {
            $tournoi = $tournois->first();
        }
        return ['tournois' => $tournois,'tournoi'  => $tournoi];
    }

}