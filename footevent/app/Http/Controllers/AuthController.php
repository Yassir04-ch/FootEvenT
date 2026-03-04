<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function index(){

  return view("auth.register");

}


public function show(){
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

            $user = Auth::user();
 
         return redirect()->route('home.index');

        }
        else {

         return back()->with('error', 'Your email or  password not correct');

        }

    }

    public function store(RegisterRequest $request){

      $validation = $request->validated();

       $user = User::create($validation);
        Auth::login($user);
        return Redirect()->route("home.index");
    }


}



