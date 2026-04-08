<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['name_equipe', 'nbJoueur', 'description', 'capitaine_id'];
 
     public function capitaine()
    {
        return $this->belongsTo(User::class, 'capitaine_id');
    }

     public function tournois()
    {
        return $this->belongsToMany(Tournoi::class, 'equipe_tournois')->withPivot('statut')->withTimestamps();
    }


    public function joueurs()
    {
            return $this->belongsToMany(User::class, 'equipe_joueur')->withPivot('statut')->withTimestamps();

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