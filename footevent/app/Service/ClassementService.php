<?php

namespace App\Service;
use App\Models\Tournoi;
use App\Models\Equipes;
use Illuminate\Http\Request;

class ClassementService {

    public function equipeNiveau(Request $request ,Tournoi $tournoi){
        $equipes = $tournoi->equipes()->with(['joueurs','capitaine'])->wherePivot('statut','!=','en_attente')->wherePivot('statut','!=','refusee');
        if($request->has('niveau')){
            $equipes->wherePivot('niveau',$request->niveau);
        }
        return $equipes->get();

    }
}