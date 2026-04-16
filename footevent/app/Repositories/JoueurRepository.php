<?php

namespace App\Repositories;

use App\Models\Joueur;

class JoueurRepository
{
    public function getJoueurs()
    {
        $joueurs = Joueur::all();
        return $joueurs;
    }

    public function createJoueur(array $data)
    {
        $joueur = Joueur::create($data);
        return $joueur;

    }

     public function findById(string $id)
    {
           $joueur = Joueur::where('user_id', $id)->first();
           return  $joueur;
    }

    public function findByPost(string $post)
    {
        return Joueur::where('poste', $post)->get();
    }

     public function findByAge(string $age)
    {
        $jpueur = Joueur::where('age', $age)->get();
        return  $joueurs;

    }
    
}