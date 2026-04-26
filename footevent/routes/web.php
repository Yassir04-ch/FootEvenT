<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TournoiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\ClassementController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');
Route::get('/auth/index', [AuthController::class, 'index'])->name('auth.index');
Route::get('/auth/create', [AuthController::class, 'create'])->name('auth.create');
Route::post("/auth/login",[AuthController::class,'login'])->name("login");

Route::middleware('auth')->group(function(){
    Route::post('/auth/logout', [AuthController::class, 'destroy'])->name('auth.destroy');
    Route::get('/auth/profile', [AuthController::class, 'profile'])->name('auth.profile');
    Route::get('/auth/edit', [AuthController::class, 'profile'])->name('auth.edit');
    Route::put('/auth/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth','role:Organisateur'])->group(function(){
    Route::put('/tournois/{tournoi}/demarer', [TournoiController::class, 'demarerTournoi'])->name('tournois.demarer');
    Route::put('/tournois/{tournoi}/terminer', [TournoiController::class, 'terminerTournoi'])->name('tournois.terminer');
    Route::post('/tournois/{tournoi}/equipes/{equipe}/refuser', [TournoiController::class, 'refuserEquipe'])->name('tournois.equipes.refuser');
    Route::post('/tournois/{tournoi}/equipes/{equipe}/valider', [TournoiController::class, 'validerEquipe'])->name('tournois.equipes.valider');
    Route::get("/organisateur/tournois", [OrganisateurController::class,'Tournois'])->name('organisateur.tournois');
    Route::get("/organisateur/matches", [OrganisateurController::class,'organisateurMatchs'])->name('organisateur.matchs');
    Route::get('/games/{tournoi}/create',[GameController::class,'create'])->name('games.create');
    Route::post('/games/{tournoi}/store',[GameController::class,'store'])->name('games.store');
    Route::put('/games/{game}/demarer',[GameController::class,'demarerGame'])->name('games.demarer');
    Route::post('/resultats/{game}/create',[ResultatController::class,'store'])->name('resultats.store');
    Route::get('/tournois/create', [TournoiController::class, 'create'])->name('tournois.create');
    Route::post('/tournois/store', [TournoiController::class, 'store'])->name('tournois.store');
    Route::get("/organisateur/index", [OrganisateurController::class,'index'])->name('organisateurs.index');
    Route::get('/resultats/{game}/create',[ResultatController::class,'create'])->name('resultats.create');
    
});

    Route::post('/equipes/{equipe}/invite', [InvitationController::class, 'store'])->name('invitations.store');


Route::middleware(['auth','role:Joueur'])->group(function(){
    Route::post('/tournois/{tournoi}/join', [TournoiController::class, 'joinTournoi'])->name('tournois.join');
    Route::post('/equipes/{equipe}/joueurs/{joueur}/valider', [EquipeController::class, 'validerJoueur'])->name('equipes.joueurs.valider');
    Route::put('/equipes/{equipe}/joueurs/{joueur}/refuser', [EquipeController::class, 'refuserJoueur'])->name('equipes.joueurs.refuser');
    Route::put('/equipes/{equipe}/joueurs/{joueur}/retirer', [EquipeController::class, 'retireJoueur'])->name('equipes.joueurs.retirer');
    Route::post("/equipes/{equipe}/join", [JoueurController::class,'joinEquipe'])->name('equipes.join');
    Route::put("/equipes/{equipe}/quitter", [JoueurController::class,'quitterEquipe'])->name('equipes.quitter');
    Route::post('/joueurs/store', [JoueurController::class, 'store'])->name('joueurs.store');
    Route::get('/equipes/{equipe}/games', [EquipeController::class, 'games'])->name('equipes.games');
    Route::get('/equipes/create', [EquipeController::class, 'create'])->name('equipes.create');
    Route::post('/equipes/store', [EquipeController::class, 'create'])->name('equipes.store');
    Route::get('/equipes/{equipe}/edit', [EquipeController::class, 'edit'])->name('equipes.edit');
    Route::post('/equipes/{equipe}/update', [EquipeController::class, 'update'])->name('equipes.update');
    Route::delete('/equipes/{equipe}/destroy', [EquipeController::class, 'destroy'])->name('equipes.destroy');
    Route::get('/joueurs/{joueur}/edit', [JoueurController::class, 'edit'])->name('joueurs.edit');
    Route::put('/joueurs/{joueur}/update', [JoueurController::class, 'update'])->name('joueurs.update');
    Route::get('/joueurs/create', [JoueurController::class, 'create'])->name('joueurs.create');
    Route::post('/joueurs/store', [JoueurController::class, 'store'])->name('joueurs.store');
    Route::get('/joueurs/index', [JoueurController::class, 'index'])->name('joueurs.index');
    Route::get('/classement/{tournoi}/niveau',[ClassementController::class,'Niveau'])->name('classement.index');

    
});
    
    Route::get('/invitations/accept/{token}', [InvitationController::class, 'accept'])->name('invitations.accept');
    Route::get('/invitations/refuse/{token}', [InvitationController::class, 'refuse'])->name('invitations.refuse');
    
Route::middleware(['auth','role:Administrateur'])->group(function(){
    Route::put('/admin/{user}/banni',[AdminController::class,'banniUser'])->name('user.banni');
    Route::put('/admin/{user}/active',[AdminController::class,'activeUser'])->name('user.active');
    Route::get('/admin/tournois',[AdminController::class,'tournois'])->name('admin.tournois');
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});

Route::delete('/tournois/{tournoi}/destroy', [TournoiController::class, 'destroy'])->name('tournois.destroy');

Route::get('/tournoi/{tournoi}/equipes', [TournoiController::class, 'equipes'])->name('tournoi.equipe');
Route::get('/tournois/{tournoi}/show', [TournoiController::class, 'show'])->name('tournois.show');
Route::get('/tournois/index', [TournoiController::class, 'index'])->name('tournois.index');
Route::get('/equipes/{equipe}/joueurs', [EquipeController::class, 'joueurs'])->name('equipes.joueurs');
Route::get('/equipes/{equipe}/classement', [EquipeController::class, 'classement'])->name('equipes.classement');
Route::get('/equipes/{equipe}/show', [EquipeController::class, 'show'])->name('equipes.show');
Route::get('/equipes/index', [EquipeController::class, 'index'])->name('equipes.index');


Route::get('/joueurs/joueurs', [JoueurController::class, 'joueurs'])->name('joueurs.joueurs');
Route::get('/joueurs/{joueur}/show', [JoueurController::class, 'show'])->name('joueurs.show');


Route::get('/games/index',[GameController::class,'index'])->name('games.index');
Route::get('/games/{game}/show',[GameController::class,'show'])->name('games.show');


Route::get('/equipes/{equipe}/classement', [ClassementController::class, 'equipeclassement'])->name('equipes.classement');

Route::get('/rankings/index',[RankingController::class,'index'])->name('rankings.index');