<?php

namespace App\Service;
use App\Models\Invitation;
use App\Models\Notification;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\User;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\InvitationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class InvitationService {

    public function create(InvitationRequest $request,Equipe $equipe)
    {
        $validation = $request->validated();
        $token = Str::random();
        $invitation = Invitation::create([
        'equipe_id' => $equipe->id,
        'user_id'=> Auth::id(),
        'email'=> $validation['email'],
        'token'=>$token,
        'statut'=> 'pending',
        ]);
        Mail::to($request->email)->send(new InvitationMail($token,$equipe));

        $user = User::where('email', $request->email)->first();

        if ($user) {
            Notification::create([
            'message'=>"vous inviter dans equipe ".$equipe->name_equipe,
            'user_id'=>$user->id
            ]);       
        }
    }

    public function accepteInvitation($token)
    {
        // dd($token, Invitation::where('token', $token)->first());
        $invitation = Invitation::where('token',$token)->first();

         if(!$invitation){
            return ['success'=>false , 'message'=>'Invitation invalide'];
        }

        if($invitation->statut == 'accepted'){
            return ['success'=>false , 'message'=>'Invitation déja accepted'];
        }
        if(!Auth::id()){
            return ['success'=>false , 'message'=>'cree votre compte'];
        }
        $user_id = Auth::id();
         
        $equipe = Equipe::whereHas('joueurs', function($q) use ($user_id) {$q->where('joueurs.user_id', $user_id)
          ->where('equipe_joueur.statut', 'actif');})->first();

        if($equipe){
            return ['success'=>false , 'message'=>'Vous avez déja joueur active dans équipe '.$equipe->name_equipe];
        } 

        
        $joueur = Joueur::where('user_id',$user_id)->first();
        if (!$joueur) {
            return ['success'=>false , 'message'=>'Joueur non trouvé'];
            }
        $invitation->equipe->joueurs()->syncWithoutDetaching([$joueur->id => ['statut' => 'actif']]);

        $invitation->update(['statut'=>'accepted']);
        return ['success'=>true , 'message'=>'Invitation acceptée avec succès'];
        
    }

     public function refuseeInvitation($token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return ['success' => false, 'message' => 'Invitation invalide'];
        }

        $invitation->update(['statut' => 'refused']);

        return ['success' => true, 'message' => 'Invitation refusée'];
    }
}