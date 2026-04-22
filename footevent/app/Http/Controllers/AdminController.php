<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Equipe;
use App\Models\Game;
use App\Models\Tournoi;
use App\Service\AdminService;
class AdminController extends Controller
{

    private AdminService $service;

    public function __construct(AdminService $service){
        $this->service = $service;
    }
    public function index()
    {
       $nbequipes = Equipe::count();
       $nbtournois = Tournoi::count();
       $notifications = $this->service->getNotifications(Auth::id());
       $users = User::where('id','!=',Auth::id())->with('role')->get();
       $gemecount = Game::where('statut','termine')->count();
       return view('admin.index',compact('users','nbequipes','nbtournois','notifications','gemecount'));
    }

    public function tournois(){
        $nbtournoisEnatente = Tournoi::where('status','en_attente')->count();
        $nbtournoisEncours = Tournoi::where('status','en_cours')->count();
        $nbtournoisTermine = Tournoi::where('status','termine')->count();
        $tournois = Tournoi::with('organisateur')->get();
        $notifications = $this->service->getNotifications(Auth::id());
        return view('admin.tournois',compact('nbtournoisEnatente','nbtournoisEncours','nbtournoisTermine','tournois','notifications'));

    }
    public function banniUser(User $user){
        $result = $this->service->banniUser($user);
        if(!$result['success']){
            return back()->with('error',$result['message']);
        }
        return back()->with('success',$result['message']);
    }

     public function activeUser(User $user){
        $result = $this->service->activeUser($user);
        if(!$result['success']){
            return back()->with('error',$result['message']);
        }
        return back()->with('success',$result['message']);
    }

}

