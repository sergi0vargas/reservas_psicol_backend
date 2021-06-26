<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/eventos', 'EventoController@index');

Route::post('/eventos/guardar', 'EventoController@store');

Route::get('/eventos/buscar', 'EventoController@show');

Route::put('/eventos/actualizar', 'EventoController@update');

Route::delete('/eventos/borrar/{id}', 'EventoController@destroy');
