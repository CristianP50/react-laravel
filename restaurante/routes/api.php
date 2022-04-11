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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => '/restaurante'], function()
{
    Route::put('', [App\Http\Controllers\RestauranteController::class, 'update']);
    Route::delete('{id}', [App\Http\Controllers\RestauranteController::class, 'destroy']);
    Route::get('', [App\Http\Controllers\RestauranteController::class, 'create']);
    Route::get('{id}', [App\Http\Controllers\RestauranteController::class, 'createId']);
    Route::post('', [App\Http\Controllers\RestauranteController::class, 'store']);
});

