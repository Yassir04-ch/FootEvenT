<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TournoiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/auth/login",[AuthController::class,'login'])->name("login");
Route::post('/auth/logout', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::get('/auth/profile', [AuthController::class, 'profile'])->name('auth.profile');
Route::get('/auth/edit', [AuthController::class, 'profile'])->name('auth.edit');
Route::put('/auth/update', [ProfileController::class, 'update'])->name('auth.update');
Route::resource("auth",AuthController::class);

Route::get('/tournoi/{tournoi}/equipes', [TournoiController::class, 'equipes'])->name('tournoi.equipe');
Route::post('/tournois/{tournoi}/join', [TournoiController::class, 'joinTournoi'])->name('tournois.join');
Route::post('/tournois/{tournoi}/equipes/{equipe}/valider', [TournoiController::class, 'validerEquipe'])->name('tournois.equipes.valider');
Route::post('/tournois/{tournoi}/equipes/{equipe}/refuser', [TournoiController::class, 'refuserEquipe'])->name('tournois.equipes.refuser');
Route::put('/tournois/{tournoi}/demarer', [TournoiController::class, 'demarerTournoi'])->name('tournois.demarer');
Route::put('/tournois/{tournoi}/terminer', [TournoiController::class, 'terminerTournoi'])->name('tournois.terminer');
Route::resource('tournois', TournoiController::class);

Route::post('/equipes/{equipe}/valider', [EquipeController::class, 'valider'])->name('equipes.valider');
Route::post('/equipes/{equipe}/refuser', [EquipeController::class, 'refuser'])->name('equipes.refuser');
Route::get('/equipes/{equipe}/joueurs', [EquipeController::class, 'joueurs'])->name('equipes.joueurs');
Route::post('/equipes/{equipe}/joueurs/{joueur}/valider', [EquipeController::class, 'validerJoueur'])->name('equipes.joueurs.valider');
Route::post('/equipes/{equipe}/joueurs/{joueur}/refuser', [EquipeController::class, 'refuserJoueur'])->name('equipes.joueurs.refuser');

Route::resource("joueurs", JoueurController::class);
Route::post("/equipes/{equipe}/join", [JoueurController::class,'joinEquipe'])->name('equipes.join');
Route::put("/equipes/{equipe}/quitter", [JoueurController::class,'quitterEquipe'])->name('equipes.quitter');
Route::resource("equipes", EquipeController::class);

Route::get("/organisateur/tournois", [OrganisateurController::class,'Tournois'])->name('organisateur.tournois');
Route::resource("organisateur", OrganisateurController::class);

Route::put('/admin/{user}/banni',[AdminController::class,'banniUser'])->name('user.banni');
Route::put('/admin/{user}/active',[AdminController::class,'activeUser'])->name('user.active');
Route::get('/admin/tournois',[AdminController::class,'tournois'])->name('admin.tournois');
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

Route::get('/games/{tournoi}/create',[GameController::class,'create'])->name('games.create');
Route::post('/games/{tournoi}/store',[GameController::class,'store'])->name('games.store');