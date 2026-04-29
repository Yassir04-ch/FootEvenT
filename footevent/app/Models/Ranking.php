<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = ['points','position','matchWin','matchlos','goals_scored','goals_conceded','equipe_id','tournoi_id',
    ];


    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }
}