<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
     protected $fillable = ['name_equipe', 'statut', 'nbJoueur', 'tournoi_id'];

    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }

    public function joueurs()
    {
        return $this->belongsToMany(Joueur::class, 'equipe_joueur');
    }

    public function gamesAsEquipe1()
    {
        return $this->hasMany(Game::class, 'equipe1_id');
    }

     public function gamesAsEquipe2()
    {
        return $this->hasMany(Game::class, 'equipe2_id');
    }
}
