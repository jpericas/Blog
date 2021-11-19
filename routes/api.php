<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AutenticaController;

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


Route::post('register', [App\Http\Controllers\AutenticaController::class, 'register' ]);
Route::post('login', [App\Http\Controllers\AutenticaController::class, 'login' ]);
    
Route::apiResource('posts', App\Http\Controllers\Api\PostController::class);
Route::apiResource('categories', App\Http\Controllers\Api\CategoriesController::class);
Route::apiResource('users', App\Http\Controllers\Api\UsersController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout', [App\Http\Controllers\AutenticaController::class, 'logout' ]);    
});

