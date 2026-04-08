<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\Equipe;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("joueur.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Joueur $joueur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joueur $joueur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joueur $joueur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joueur $joueur)
    {
        //
    }


    public function joinEquipe(Equipe $equipe)
    {

     $user_id = Auth::id();

     if ($equipe->capitaine_id === $user_id) {
        return back()->with('error', 'Vous êtes déjà le capitaine de cette équipe.');
     }

     $chek = $equipe->joueurs()->where('user_id', $user_id)->exists();

     if ($chek){
        return back()->with('error', 'Vous êtes déjà dans cette équipe.');
     }



    }
}
