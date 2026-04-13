<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TournoiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\OrganisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/auth/login",[AuthController::class,'login'])->name("login");
Route::post('/auth/logout', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::resource("auth",AuthController::class);


Route::get('/tournoi/{tournoi}/equipes', [TournoiController::class, 'equipes'])->name('tournoi.equipe');
Route::post('/tournois/{tournoi}/join', [TournoiController::class, 'joinTournoi'])->name('tournois.join');
Route::post('/tournois/{tournoi}/equipes/{equipe}/valider', [TournoiController::class, 'validerEquipe'])->name('tournois.equipes.valider');
Route::post('/tournois/{tournoi}/equipes/{equipe}/refuser', [TournoiController::class, 'refuserEquipe'])->name('tournois.equipes.refuser');
Route::resource('tournois', TournoiController::class);

Route::post('/equipes/{equipe}/valider', [EquipeController::class, 'valider'])->name('equipes.valider');
Route::post('/equipes/{equipe}/refuser', [EquipeController::class, 'refuser'])->name('equipes.refuser');
Route::get('/equipes/{equipe}/joueurs', [EquipeController::class, 'joueurs'])->name('equipes.joueurs');
Route::post('/equipes/{equipe}/joueurs/{joueur}/valider', [EquipeController::class, 'validerJoueur'])->name('equipes.joueurs.valider');
Route::post('/equipes/{equipe}/joueurs/{joueur}/refuser', [EquipeController::class, 'refuserJoueur'])->name('equipes.joueurs.refuser');

Route::resource("joueurs", JoueurController::class);
Route::post("/equipes/{equipe}/join", [JoueurController::class,'joinEquipe'])->name('equipes.join');
Route::resource("equipes", EquipeController::class);

Route::get("/organisateur/tournois", [OrganisateurController::class,'Tournois'])->name('organisateur.tournois');

Route::resource("admin", AdminController::class);
Route::resource("organisateur", OrganisateurController::class);
