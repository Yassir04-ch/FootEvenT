<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournoi extends Model
{
    protected $fillable = ['name_tournoi', 'lieu', 'date_debut', 'date_fin', 'nbEquipes', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipes()
    {
        return $this->hasMany(Equipe::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
