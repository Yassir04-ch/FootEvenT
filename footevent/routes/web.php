<?php

use App\Http\Controllers\AuthController;
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


