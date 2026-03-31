<?php

namespace App\Repository;

use App\Models\Tournoi;
use Illuminate\Http\Request;

class TournoiRepository
{
    public function getAll(Request $request)
    {
        $tournoi = Tournoi::with('user');

        if ($request->has('status')) {
            $tournoi->where('status', $request->status);
        }

        return $tournoi->get();
    }

    public function findById(Tournoi $tournoi)
    {
        $tournoi = $tournoi->load('user');
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
}