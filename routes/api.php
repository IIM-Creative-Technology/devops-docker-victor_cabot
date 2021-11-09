<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Equipe;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/equipesList/{q?}', 'EquipeController@index');
Route::post('/equipesList', 'EquipeController@store');
Route::get('/equipes/edit/{id}', 'EquipeController@edit');
Route::patch('/equipes/edit/{id}', 'EquipeController@update');
Route::delete('/equipes/{id}', 'EquipeController@destroy');





