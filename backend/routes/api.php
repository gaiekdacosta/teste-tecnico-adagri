<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\RebanhoController;
use App\Http\Controllers\UnidadeProducaoController;

Route::get('/', function () {
    return response()->json([
        'message' => 'Bem-vindo à API Gestão Agropecuária!', 
        'version' => '1.0.0', 
        'status' => 'online',
        'Developer' => 'Gaiek Da Costa'
    ]);
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/me', [AuthController::class, 'me'])->middleware('auth');

Route::get('/produtores', [ProdutorController::class, 'index']);

Route::get('/produtores/{id}', [ProdutorController::class, 'show']);

Route::get('/propriedades', [PropriedadeController::class, 'index']);

Route::get('/rebanhos', [RebanhoController::class, 'index']);

Route::get('/unidade-producao', [UnidadeProducaoController::class, 'index']);