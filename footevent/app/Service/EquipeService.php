<?php

namespace App\Service;

use App\Models\Equipe;
use App\Models\Tournoi;
use App\Repository\EquipeRepository;

class EquipeService
{
    private $repository;

    public function __construct(EquipeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $equipes = $this->repository->getAll();
        return $equipes;
    }

    public function show(Equipe $equipe)
    {
        $equipe = $this->repository->findById($equipe);
        return $equipe;

    }

    public function getByTournoi(Tournoi $tournoi)
    {
        $equipes = $this->repository->getByTournoi($tournoi);
        return $equipes;
    }


    public function create($validated, $user_id)
    {
        $tournoi = Tournoi::find($validated['tournoi_id']);

        if ($tournoi->status !== 'en_attente') {
            return ['success' => false, 'message' => "Ce tournoi n'accepte pas d'inscriptions."];
        }

        $nbequipe = Equipe::where('tournoi_id', $validated['tournoi_id'])->where('statut', 'validee')->count();

        if ($nbequipe >= $tournoi->nbEquipes) {
            return ['success' => false, 'message' => 'Le nombre des equipes du tournoi est complet.'];
        }

        $inscrir = Equipe::where('tournoi_id', $validated['tournoi_id'])->where('capitaine_id', $user_id)->exists();

        if ($inscrir) {
            return ['success' => false, 'message' => 'Vous avez déja une équipe dans ce tournoi.'];
        }
       
        $equipe = $this->repository->create([
            'name_equipe'  => $validated['name_equipe'],
            'nbJoueur'     => $validated['nbJoueur'],
            'tournoi_id'   => $validated['tournoi_id'],
            'capitaine_id' => $user_id,
            'statut'       => 'en_attente',
        ]);

        return ['success' => true, 'message' => 'Equipe crée avec succès.', 'equipe' => $equipe];
    }


    public function update( $validated, Equipe $equipe, $user_id)
    {
        if ($equipe->capitaine_id !== $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        if ($equipe->statut === 'validee') {
            return ['success' => false, 'message' => 'impossible de modifier une équipe validée.'];
        }

        $equipe = $this->repository->update($equipe, $validated);
        return ['success' => true, 'message' => 'Equipe est modifier.', 'equipe' => $equipe];
    }


    public function delete(Equipe $equipe, $user_id)
    {
        if ($equipe->capitaine_id !== $user_id) {
            return ['success' => false, 'message' => 'Action non autorisée.'];
        }

        if ($equipe->statut === 'validee') {
            return ['success' => false, 'message' => 'Impossible de supprimer une équipe validée.'];
        }

        $this->repository->delete($equipe);
        return ['success' => true, 'message' => 'Equipe supprimée.'];
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