<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function index(){
  $roles = Role::where('name','!=','Administrateur')->get();
  return view("auth.register",compact('roles'));

}


public function create(){
  return view("auth.login");
    
}

public function login(Request $request)
{
    $login = $request->validate([
        "email"=>"required|email",
        "password"=>"required|string",
    ]);

    if(Auth::attempt($login)){
       $request->session()->regenerate();

       $role = Auth::user()->role->name;

       if($role == "Organisateur" ){
          return view('organisateur.index');
       }
       else if($role == "Administrateur" ){
          return view('admin.index');
       }
       else{
          return view('joueur.index');
       }

          return redirect('/');

        }
        else {

         return back()->with('error', 'Your email or  password not correct');

        }

    }

    public function store(RegisterRequest $request){

      $validation = $request->validated();
      $validation['password'] = bcrypt($validation['password']);
       $user = User::create($validation);
        Auth::login($user);
        return Redirect('/');
    }


    public function destroy(Request $request)
  {
      Auth::logout();
      $request->session()->invalidate();
       return redirect('/');
  }

}



