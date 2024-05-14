<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('empleados')->group(function () {
    Route::get('/', 'EmpleadoController@index');
    Route::post('/', 'EmpleadoController@store');
    Route::get('/{id}', 'EmpleadoController@show');
    Route::put('/{id}', 'EmpleadoController@update');
    Route::delete('/{id}', 'EmpleadoController@destroy');
});

