<?php

namespace App\Repository;
use App\Models\Tournoi;
use App\Models\Equipe;
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
    
    public function joinTournoi(Tournoi $tournoi, Equipe $equipe)
    {
        $equipe->tournois()->attach($tournoi->id, ['statut' => 'en_attente']);
    }

    public function validerEquipe($equipe , $tournoi_id ){
        
         $equipe->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'validee']);
    }

     public function refuserEquipe($equipe , $tournoi_id){
         $equipe->tournois()->updateExistingPivot($tournoi_id, ['statut' => 'refusee']);
    }
    
    public function getEquipesValidees(Tournoi $tournoi)
    {
        return $tournoi->equipes()->wherePivot('statut', 'validee')->with('capitaine')->get();
    }

    public function getEquipesEnAttente(Tournoi $tournoi)
    {
        return $tournoi->equipes()->wherePivot('statut', 'en_attente')->with('capitaine')->get();
    }
    

}