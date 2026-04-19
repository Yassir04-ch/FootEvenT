<?php

namespace App\Http\Controllers;
use App\Models\Tournoi;
use Illuminate\Http\Request;
use App\Service\ClassementService;

class ClassementController extends Controller{
    private $service;

    public function __construct(ClassementService $service){
        $this->service = $service;
    }

    public function Niveau(Request $request ,Tournoi $tournoi){
       $niveau = $request->niveau;
       $equipes = $this->service->equipeNiveau($request , $tournoi);
        return view('classement.index',compact('equipes','tournoi','niveau'));
    }


}