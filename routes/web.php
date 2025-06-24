<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\DenuncianteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaDenunciaController;
use App\Http\Controllers\StatusCasoController;
use App\Http\Controllers\EquipeTratamentoController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\LogAuditoriaController;
use App\Http\Controllers\AnexoController;
use App\Http\Controllers\ConfiguracaoSistemaController;
use App\Http\Controllers\ComunicacaoCasoController;
use App\Http\Controllers\AtribuicaoCasoController;
use App\Http\Controllers\PessoaEnvolvidaCasoController;
use App\Http\Controllers\Admin\DashboardController;

// Rate limiting
Route::middleware('throttle:60,1')->group(function () {
    // Rotas de autenticação
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect()->route('denuncias.index');
    });

    // Rotas protegidas
    Route::middleware(['auth'])->group(function () {
        // Rotas de denúncias
        Route::get('/denuncias', [DenunciaController::class, 'index'])->name('denuncias.index');
        Route::get('/denuncias/{id}', [DenunciaController::class, 'show'])->name('denuncias.show');
        Route::post('/denuncias', [DenunciaController::class, 'store'])->name('denuncias.store');
        Route::put('/denuncias/{id}', [DenunciaController::class, 'update']);
        Route::delete('/denuncias/{id}', [DenunciaController::class, 'destroy']);
        Route::get('/casos', [CasoController::class, 'index']);
        Route::post('/casos', [CasoController::class, 'store']);
        Route::get('/casos/{id}', [CasoController::class, 'show']);
        Route::put('/casos/{id}', [CasoController::class, 'update']);
        Route::delete('/casos/{id}', [CasoController::class, 'destroy']);
        Route::get('/denunciantes', [DenuncianteController::class, 'index']);
        Route::post('/denunciantes', [DenuncianteController::class, 'store']);
        Route::get('/denunciantes/{id}', [DenuncianteController::class, 'show']);
        Route::put('/denunciantes/{id}', [DenuncianteController::class, 'update']);
        Route::delete('/denunciantes/{id}', [DenuncianteController::class, 'destroy']);
        Route::get('/usuarios', [UsuarioController::class, 'index']);
        Route::post('/usuarios', [UsuarioController::class, 'store']);
        Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
        Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
        Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);
        Route::get('/categorias', [CategoriaDenunciaController::class, 'index']);
        Route::post('/categorias', [CategoriaDenunciaController::class, 'store']);
        Route::get('/categorias/{id}', [CategoriaDenunciaController::class, 'show']);
        Route::put('/categorias/{id}', [CategoriaDenunciaController::class, 'update']);
        Route::delete('/categorias/{id}', [CategoriaDenunciaController::class, 'destroy']);
        Route::get('/statuscaso', [StatusCasoController::class, 'index']);
        Route::post('/statuscaso', [StatusCasoController::class, 'store']);
        Route::get('/statuscaso/{id}', [StatusCasoController::class, 'show']);
        Route::put('/statuscaso/{id}', [StatusCasoController::class, 'update']);
        Route::delete('/statuscaso/{id}', [StatusCasoController::class, 'destroy']);
        Route::get('/equipes', [EquipeTratamentoController::class, 'index']);
        Route::post('/equipes', [EquipeTratamentoController::class, 'store']);
        Route::get('/equipes/{id}', [EquipeTratamentoController::class, 'show']);
        Route::put('/equipes/{id}', [EquipeTratamentoController::class, 'update']);
        Route::delete('/equipes/{id}', [EquipeTratamentoController::class, 'destroy']);
        Route::get('/permissoes', [PermissaoController::class, 'index']);
        Route::post('/permissoes', [PermissaoController::class, 'store']);
        Route::get('/permissoes/{id}', [PermissaoController::class, 'show']);
        Route::put('/permissoes/{id}', [PermissaoController::class, 'update']);
        Route::delete('/permissoes/{id}', [PermissaoController::class, 'destroy']);
        Route::get('/perfis', [PerfilController::class, 'index']);
        Route::post('/perfis', [PerfilController::class, 'store']);
        Route::get('/perfis/{id}', [PerfilController::class, 'show']);
        Route::put('/perfis/{id}', [PerfilController::class, 'update']);
        Route::delete('/perfis/{id}', [PerfilController::class, 'destroy']);
        Route::get('/logs', [LogAuditoriaController::class, 'index']);
        Route::get('/logs/{id}', [LogAuditoriaController::class, 'show']);
        Route::get('/anexos', [AnexoController::class, 'index']);
        Route::post('/anexos', [AnexoController::class, 'store']);
        Route::get('/anexos/{id}', [AnexoController::class, 'show']);
        Route::put('/anexos/{id}', [AnexoController::class, 'update']);
        Route::delete('/anexos/{id}', [AnexoController::class, 'destroy']);
        Route::get('/configuracoes', [ConfiguracaoSistemaController::class, 'index']);
        Route::post('/configuracoes', [ConfiguracaoSistemaController::class, 'store']);
        Route::get('/configuracoes/{id}', [ConfiguracaoSistemaController::class, 'show']);
        Route::put('/configuracoes/{id}', [ConfiguracaoSistemaController::class, 'update']);
        Route::delete('/configuracoes/{id}', [ConfiguracaoSistemaController::class, 'destroy']);
        Route::get('/comunicacoes', [ComunicacaoCasoController::class, 'index']);
        Route::post('/comunicacoes', [ComunicacaoCasoController::class, 'store']);
        Route::get('/comunicacoes/{id}', [ComunicacaoCasoController::class, 'show']);
        Route::put('/comunicacoes/{id}', [ComunicacaoCasoController::class, 'update']);
        Route::delete('/comunicacoes/{id}', [ComunicacaoCasoController::class, 'destroy']);
        Route::get('/atribuicoes', [AtribuicaoCasoController::class, 'index']);
        Route::post('/atribuicoes', [AtribuicaoCasoController::class, 'store']);
        Route::get('/atribuicoes/{id}', [AtribuicaoCasoController::class, 'show']);
        Route::put('/atribuicoes/{id}', [AtribuicaoCasoController::class, 'update']);
        Route::delete('/atribuicoes/{id}', [AtribuicaoCasoController::class, 'destroy']);
        Route::get('/pessoas-envolvidas', [PessoaEnvolvidaCasoController::class, 'index']);
        Route::post('/pessoas-envolvidas', [PessoaEnvolvidaCasoController::class, 'store']);
        Route::get('/pessoas-envolvidas/{id}', [PessoaEnvolvidaCasoController::class, 'show']);
        Route::put('/pessoas-envolvidas/{id}', [PessoaEnvolvidaCasoController::class, 'update']);
        Route::delete('/pessoas-envolvidas/{id}', [PessoaEnvolvidaCasoController::class, 'destroy']);
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

    // Rotas públicas
    Route::get('/categorias', [CategoriaDenunciaController::class, 'index']);
    Route::post('/denuncias', [DenunciaController::class, 'store'])->name('denuncias.store');
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});
