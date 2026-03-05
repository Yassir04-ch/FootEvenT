<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['dateMatch', 'terrain', 'statut', 'tournoi_id', 'equipe1_id', 'equipe2_id'];

    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }

    public function equipe1()
    {
        return $this->belongsToMany(Equipe::class, 'equipe1_id');
    }

    public function equipe2()
    {
        return $this->belongsToMany(Equipe::class, 'equipe2_id');
    }

    public function resultat()
    {
        return $this->hasOne(Resultat::class);
    }
}