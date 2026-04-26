<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\InvitationRequest;

class InvitationController extends Controller
{
   private InvitationService $service;

   public function __construct(InvitationService $service){
    $this->service = $service;
   }

    public function store(InvitationRequest $request,Equipe $equipe){
        $this->service->create($request,$equipe);
        
        return back()->with('invitation',"Invitation envoyée");
    }
}
