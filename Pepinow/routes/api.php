<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PlantesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResetPasswordController;
// use App\Http\Controllers\RoleController;


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

Route::apiResource('roles', RoleController::class);
Route::controller(RoleController::class)->group(function (){
    //  Show permissions of aRole 
    Route::get('Roles/permissions/{role_id}', 'ShowPermissionsOfaRole');
    //  Show roles of a User 
    Route::get('User/roles/{user_id}', 'ShowRolesOfaPermissions');
    //  Delete A Role 
    Route::delete('Role/{role_id}', 'destroy');
    //  Assign Permissions to Role 
    Route::post('Role/assignPermissions', 'assignPermissions');
    //  Assign Role to User 
    Route::post('Role/assignRole', 'assignRole');
    //  Remove Permissions from a Role 
    Route::post('Role/RemovePermissions', 'RemovePermissions');
    //  Remove Role from a user 
    Route::post('Role/RemoveRole', 'RemoveRole');
});

Route::apiResource('permissions', PermissionController::class);

Route::apiResource('plantes', PlantesController::class);
// Route::apiResource('plantes', PlantesController::class)->only(['index','show'])->middleware(['auth','checkUser']);

Route::apiResource('categories', CategoriesController::class);
// Route::apiResource('categories', CategoriesController::class)->only(['index','show'])->middleware(['auth','checkUser']);

// Forgot-Reset password 
// Route::group(['controller' => ResetPasswordController::class], function (){
//     // Request password reset link
//     Route::post('forgot-password', 'sendResetLinkEmail')->middleware('guest')->name('password.email');
//     // Reset password
//     Route::post('reset-password', 'resetPassword')->middleware('guest')->name('password.update');

//     Route::get('reset-password/{token}', function (string $token) {
//          return $token;
//      })->middleware('guest')->name('password.reset');
// });