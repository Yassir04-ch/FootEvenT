<?php

namespace App\Service;

use App\Models\Tournoi;
use App\Repository\TournoiRepository;
use Illuminate\Http\Request;

class TournoiService
{
    private $repository;

    public function __construct(TournoiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(Request $request)
    {
        return $this->repository->getAll($request);
    }

    public function show(Tournoi $tournoi)
    {
        $tournoi = $this->repository->findById($tournoi);
        return $tournoi;

    }

    public function create( $validated, $userId) 
    {
        $validated['user_id'] = $userId;
        $tournoi = $this->repository->create($validated);
        $message = 'Tournoi crée avec succès.';

        return ['message' => $message,'tournoi' => $tournoi];
    }

    public function update( $validated, Tournoi $tournoi, $user_id) 
    {
         if ($tournoi->user_id !== $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        $tournoi = $this->repository->update($tournoi, $validated);
        return ['success' => true, 'message' => 'Tournoi mis à jour avec succès.', 'tournoi' => $tournoi];
    }

    public function delete(Tournoi $tournoi, $userId) 
    {
         if ($tournoi->user_id !== $userId) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        $this->repository->delete($tournoi);
        return ['success' => true, 'message' => 'Tournoi supprimé avec succès.'];
    }

    public function validerEquipe(Equipe $equipe)
    {
        $equipe = $this->repository->validerEquipe($equipe);
        return $equipe;
    }

    public function refuserEquipe(Equipe $equipe)
    {
        $equipe = $this->repository->refuserEquipe($equipe);
        return $equipe;
    }
    
}