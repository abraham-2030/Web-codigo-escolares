<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorizacionesInscripcionesController;


Route::get('/', function () {
    return view('layouts.app2');
    });
//Route::get('/', function () {
   // return view('Index');
    
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


    Route::resource('escolares', AutorizacionesInscripcionesController::class);
    