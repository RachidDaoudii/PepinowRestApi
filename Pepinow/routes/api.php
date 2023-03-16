<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlantesController;
use App\Http\Controllers\CategoriesController;

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


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::get('infoProfile', 'infoProfile');
    Route::get('editProfile', 'editProfile');
    Route::post('refresh', 'refresh');
    Route::post('logout', 'logout');
});

Route::apiResource('plantes', PlantesController::class)->middleware(['auth','checkAdmin']);
Route::apiResource('plantes', PlantesController::class)->only(['index','show'])->middleware(['auth','checkUser']);

Route::apiResource('categories', CategoriesController::class)->middleware(['auth','checkAdmin']);
Route::apiResource('categories', CategoriesController::class)->only(['index','show'])->middleware(['auth','checkUser']);

