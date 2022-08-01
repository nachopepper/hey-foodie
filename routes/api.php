<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PotionController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\WitchController;

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

Route::group(['middleware' => ['api']], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('test', [AuthController::class, 'test']);
    Route::apiResource('ingredients', IngredientController::class);

    Route::prefix('potions')->group(function () {
        Route::get('/{id}',     [PotionController::class, 'show']);
        Route::post('',         [PotionController::class, 'store']);
    });

    Route::prefix('sells')->group(function () {
        Route::get('/{id}',     [SellController::class, 'show']);
        Route::post('',         [SellController::class, 'store']);
    });

    Route::post('witch', [WitchController::class, 'store']);
    Route::post('recipe', [SellController::class, 'store']);

});

