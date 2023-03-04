<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('usuarios')->group(function(){
    Route::controller(UsuariosController::class)->group(function () {
        Route::get('all', 'index');
        Route::get('show/{id}', 'show');
        Route::post('new', 'store');
        Route::put('update/{id}', 'update');
        Route::delete('delete/{id}', 'destroy');
    });
});
