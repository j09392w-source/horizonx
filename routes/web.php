<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\PublicacionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::post('/procesarLogin', [Authcontroller::class, 'login'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('home', [PublicacionesController::class,'index']);

Route::get('/upload', function () {
    return view('upload');
})->middleware('auth');

Route::post('/procesoPublicacion', [PublicacionesController::class,'store'] );

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth');

Route::get('/perfil', [Authcontroller::class,'perfil'] );