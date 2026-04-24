<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = ['points','position','matchWin','matchlos','goals_scored','equipe_id','tournoi_id',
    ];

    /**
     * Relation avec l'équipe
     */
    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    /**
     * Relation avec le tournoi
     */
    public function tournoi()
    {
        return $this->belongsTo(Tournoi::class);
    }
}