<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;

// Rate limiting
Route::middleware('throttle:60,1')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Rotas protegidas
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DenunciaController::class, 'index'])->name('dashboard');
        Route::post('/denuncias', [DenunciaController::class, 'store'])->name('denuncias.store');
        Route::get('/denuncias/{id}', [DenunciaController::class, 'show'])->name('denuncias.show');
    });
});
