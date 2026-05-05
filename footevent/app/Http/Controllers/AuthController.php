<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Service\AuthService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

     public function index()
    {
        $roles = $this->service->getRoles();
        return view('auth.register', compact('roles'));
    }

     public function create()
    {
        return view('auth.login');
    }

     public function store(RegisterRequest $request)
    {
        $result = $this->service->register($request->validated());
         if(!$result['success'])
         {
              return back()->with('error',$result['message']);
         }
        $user = Auth::user();
         if($user->role->name == "Organisateur" ){
                return redirect()->route('organisateurs.index');
            }
            else if($user->role->name  == "Administrateur" ){
                return redirect()->route('admin.index');
            }
            else if($user->role->name == "Joueur"){
                return redirect()->route('joueurs.create');
            }else{
                return redirect('/');
            }   
    }

 
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $result = $this->service->login($validated , $request);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

       if($result['role'] == "Organisateur" ){
         return redirect()->route('organisateurs.index');
       }
       else if($result['role'] == "Administrateur" ){
         return redirect()->route('admin.index');
       }
       else if($result['role'] == "Joueur"){
         return redirect()->route('joueurs.index');
       }else{
          return redirect('/');
       }

     }

     public function destroy(Request $request)
    {
        $this->service->logout($request);
        return redirect('/');
    }

    public function profile(){
        $user = User::with('role','joueur')->where('id',Auth::id())->first();
        return view('auth.profile',compact('user'));
    }



}