<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InvitationRequest;
use App\Service\InvitationService;
use App\Models\Equipe;

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

    public function accept($token) 
    {
        $result = $this->service->accepteInvitation($token);

        if (!$result['success']) {
            return redirect('/')->with('error', $result['message']);
        }
        return redirect()->route('joueurs.index')->with('success', $result['message']);
    }

    public function refuse($token)
    {
        $result = $this->service->refuseeInvitation($token);

        if (!$result['success']) {
            return redirect('/')->with('error', $result['message']);
        }

        return redirect()->route('joueurs.index')->with('success', $result['message']);
    }
}
