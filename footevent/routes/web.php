<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get("auth/login",[AuthController::class,'index'])->name("login");
Route::resource("auth",AuthController::class);