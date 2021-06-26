<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\EventoController;
use App\Http\Controllers\API\ClienteController;

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('eventos', EventoController::class);
});

Route::middleware('auth:api')->put('clientes/vender', [ClienteController::class, 'vender'])->name('clientes.vender');

Route::middleware('auth:api')->group( function () {
    Route::resource('clientes', ClienteController::class);
});
