<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['dateMatch','heure','terrain', 'statut', 'tournoi_id', 'equipe1_id', 'equipe2_id'];

    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'equipe_game')->withPivot('winner')->withTimestamps();
    }

    public function resultat()
    {
        return $this->hasOne(Resultat::class);
    }

    public function getEquipe1Attribute()
    {
        return $this->equipes->first();
    }

    public function getEquipe2Attribute()
    {
        return $this->equipes->last();
    }



}