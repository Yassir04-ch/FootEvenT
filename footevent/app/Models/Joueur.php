<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = ['name', 'poste', 'age', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'equipe_joueur');
    }
}
