<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = ['poste', 'age', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'equipe_joueur')->withPivot('statut')->withTimestamps();
    }

    public function activeJoueur()
    {
        return $this->equipes()->wherePivot('statut', 'actif')->exists();
    }

}
