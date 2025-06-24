<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\CasoController;

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
        Route::get('/denuncias', [DenunciaController::class, 'index']);
        Route::post('/denuncias', [DenunciaController::class, 'store']);
        Route::put('/denuncias/{id}', [DenunciaController::class, 'update']);
        Route::delete('/denuncias/{id}', [DenunciaController::class, 'destroy']);
        Route::get('/casos', [CasoController::class, 'index']);
        Route::post('/casos', [CasoController::class, 'store']);
        Route::get('/casos/{id}', [CasoController::class, 'show']);
        Route::put('/casos/{id}', [CasoController::class, 'update']);
        Route::delete('/casos/{id}', [CasoController::class, 'destroy']);
    });
});
