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

// Rotas RESTful de API pública
Route::apiResource('denuncias', DenunciaController::class);
Route::apiResource('casos', CasoController::class);
Route::apiResource('denunciantes', DenuncianteController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('categorias', CategoriaDenunciaController::class);
Route::apiResource('statuscaso', StatusCasoController::class);
Route::apiResource('equipes', EquipeTratamentoController::class);
Route::apiResource('permissoes', PermissaoController::class);
Route::apiResource('perfis', PerfilController::class);
Route::apiResource('logs', LogAuditoriaController::class)->only(['index', 'show']);
Route::apiResource('anexos', AnexoController::class);
Route::apiResource('configuracoes', ConfiguracaoSistemaController::class);
Route::apiResource('comunicacoes', ComunicacaoCasoController::class);
Route::apiResource('atribuicoes', AtribuicaoCasoController::class);
Route::apiResource('pessoas-envolvidas', PessoaEnvolvidaCasoController::class); 