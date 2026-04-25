<?php

namespace App\Service;
use App\Models\Invitation;
use App\Models\Equipe;
use App\Mail\InvitationMail;
use Illuminate\Http\InvitationRequest;


class InvitationService {

    public function create(InvitationRequest $request,Equipe $equipe)
    {
        $validation = $request->validated();
        $token = Str::random();
        Invitation::create([
        'equipe_id' => $colocation->id,
        'user_id'=> Auth::id(),
        'email'=> $validation['email'],
        'token'=>$token,
        'status'=> 'pending',
        ]);

        Mail::to($request->email)->send(new InvitationMail($token));
    }

    public function accepteInvitation()
    {

    }

     public function refuseeInvitation()
    {

    }
}