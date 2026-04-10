<?php

namespace App\Repository;
use App\Models\Tournoi;
use Illuminate\Http\Request;

class TournoiRepository
{
    public function getAll(Request $request)
    {
        $tournoi = Tournoi::with('organisateur');

        if ($request->has('status')) {
            $tournoi->where('status', $request->status);
        }

        return $tournoi->get();
    }

    public function findById(Tournoi $tournoi)
    {
        $tournoi = $tournoi->load('organisateur');
        return $tournoi;

    }

    public function create(array $data)
    {
        $tournoi = Tournoi::create($data);
        return $tournoi;
    }

    public function update(Tournoi $tournoi,array $data)
    {
        $tournoi->update($data);
        return $tournoi;
    }

    public function delete(Tournoi $tournoi)
    {
        $tournoi->delete();
    }

    public function validerEquipe($equipe , $tournoi_id){
         $equipe->tournois()->attach($tournoi_id, ['statut' => 'validee']);
    }

     public function refuserEquipe($equipe , $tournoi_id){
         $equipe->tournois()->attach($tournoi_id, ['statut' => 'refusee']);
    }

}