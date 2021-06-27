<?php

header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\EventoController;
use App\Http\Controllers\API\ClienteController;


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('eventos', EventoController::class);
});

Route::middleware('auth:api')->put('clientes/vender', [ClienteController::class, 'vender'])->name('clientes.vender');

Route::middleware('auth:api')->group( function () {
    Route::resource('clientes', ClienteController::class);
});
