<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SpeciesController;

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

Route::apiResource('animals', AnimalController::class)->only(['index' , 'show']);
Route::apiResource('species', SpeciesController::class);
Route::get('species/{id}/animals', [AnimalController::class, 'indexSpecie']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function(Request $request) {
        return auth()->user();
    });
    Route::apiResource('animals', AnimalController::class)->except(['index', 'show']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});

