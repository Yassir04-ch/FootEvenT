<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $fillable = ['scoreEq1','scoreEq2', 'penaltyE1','penaltyE2','date', 'game_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function winner()
    {
        return $this->belongsTo(Equipe::class);
    }
}
