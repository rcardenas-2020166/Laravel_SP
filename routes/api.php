<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// RUTAS //

Route::get('getCategorias', 'App\Http\Controllers\CategoriaController@getCategorias');
Route::get('getCategoria/{id}', 'App\Http\Controllers\CategoriaController@getCategoria');

Route::post('createCategoria', 'App\Http\Controllers\CategoriaController@createCategoria');
Route::put('updateCategoria/{id}', 'App\Http\Controllers\CategoriaController@updateCategoria');
