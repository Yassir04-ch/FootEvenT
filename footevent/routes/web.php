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
Route::resource("tournois",TournoiController::class);


Route::post('/equipes/{equipe}/valider', [EquipeController::class, 'valider'])->name('equipes.valider');
Route::post('/equipes/{equipe}/refuser', [EquipeController::class, 'refuser'])->name('equipes.refuser');


Route::resource("joueurs", JoueurController::class);
Route::post("/equipes/{equipe}/join", [JoueurController::class,'joinEquipe'])->name('equipes.join');
Route::resource("equipes", EquipeController::class);


Route::resource("admin", AdminController::class);
Route::resource("organisateur", OrganisateurController::class);
