<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Service\AuthService;
use Illuminate\Http\Request;
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
        $this->service->register($request->validated());
        return redirect('/');
    }

 
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $result = $this->service->login($validated);

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        $request->session()->regenerate();

       if($result['role'] == "Organisateur" ){
          return view('organisateur.index');
       }
       else if($result['role'] == "Administrateur" ){
          return view('admin.index');
       }
       else if($result['role'] == "joueur"){
          return view('joueur.index');
       }else{
          return redirect('/');
       }

     }

     public function destroy(Request $request)
    {
        $this->service->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}