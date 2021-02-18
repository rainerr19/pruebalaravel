<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/boleta','boletasController@index');
Route::post('/boleta/create_comprador', 'boletasController@create_comprador');
Route::post('/boleta/create', 'boletasController@create');
Route::put('/boleta/asignar/{id_boleta}','boletasController@asignar');
Route::delete('/boleta/eliminar/{id_boleta}','boletasController@eliminar');
