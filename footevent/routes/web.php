<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TournoiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post("/auth/login",[AuthController::class,'login'])->name("login");
Route::post('/auth/logout', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::resource("auth",AuthController::class);
Route::resource("tournois",TournoiController::class);


Route::resource("equipes", EquipeController::class);
Route::post('/equipes/{equipe}/valider', [EquipeController::class, 'valider'])->name('equipes.valider');
Route::post('/equipes/{equipe}/refuser', [EquipeController::class, 'refuser'])->name('equipes.refuser');


