<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournoi extends Model
{
    protected $fillable = ['name_tournoi','description', 'lieu', 'date_debut', 'date_fin', 'nbEquipes', 'status', 'user_id'];

    public function organisateur()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'equipe_tournois')->withPivot('statut','niveau')->withTimestamps();
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
