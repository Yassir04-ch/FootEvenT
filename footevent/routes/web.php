<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get("auth/login",[AuthController::class,'index'])->name("login");
Route::get("auth/logout",[AuthController::class,'logout'])->name("logout");
Route::resource("auth",AuthController::class);