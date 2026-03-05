<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $fillable = ['scoreEq1', 'scoreEq2', 'date', 'game_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
