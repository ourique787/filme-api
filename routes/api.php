<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/filme', [FilmeController::class, 'listar']);
Route::get('/filme/{id}', [FilmeController::class, 'buscarPeloId']);
Route::post('/filme', [FilmeController::class, 'criar']);
Route::put('/filme/{id}',[FilmeController::class, 'atualizar']); 
Route::delete('/filme/{id}',[FilmeController::class, 'deletar']); 
