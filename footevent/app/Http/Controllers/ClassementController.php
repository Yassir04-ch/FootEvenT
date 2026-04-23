<?php

namespace App\Http\Controllers;
use App\Models\Tournoi;
use App\Models\Equipe;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Service\ClassementService;
use Illuminate\Support\Facades\Auth;


class ClassementController extends Controller{
    private ClassementService $service;

    public function __construct(ClassementService $service){
        $this->service = $service;
    }

    public function Niveau(Request $request ,Tournoi $tournoi){
       $niveau = $request->niveau;
       $equipes = $this->service->equipeNiveau($request , $tournoi);
        return view('classement.index',compact('equipes','tournoi','niveau'));
    }

    public function equipeclassement(Request $request, Equipe $equipe)
    {
        $result   = $this->service->equipeclassement($request, $equipe);
        $tournois = $result['tournois'];
        $tournoi  = $result['tournoi'];
        return view('classement.index', compact('equipe', 'tournois', 'tournoi'));
    }


}