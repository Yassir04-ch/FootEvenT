<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['name_equipe','image','nbJoueur', 'description', 'capitaine_id'];
 
     public function capitaine()
    {
        return $this->belongsTo(User::class, 'capitaine_id');
    }

     public function tournois()
    {
        return $this->belongsToMany(Tournoi::class, 'equipe_tournois')->withPivot('statut','niveau')->withTimestamps();
    }


    public function joueurs()
    {
        return $this->belongsToMany(Joueur::class, 'equipe_joueur')->withPivot('statut')->withTimestamps();
    }


    public function games()
    {
        return $this->belongsToMany(Game::class, 'equipe_game')->withPivot('winner')->withTimestamps();
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    
}