<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/forgot-password', function () {
    return view('usuario.forgotpassword');
})->name('usuario.forgotpassword');

//Login
Route::post('/home', [UsuarioController::class, 'login'])->name('usuario.login');

