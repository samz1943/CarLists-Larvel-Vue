<?php

use App\Http\Controllers\CarAvailabilityController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::post('login', [HomeController::class, 'login']);

Route::middleware('auth:api')->group(function() {
    Route::get('admin', [HomeController::class, 'index']);
    Route::get('user', [UserController::class, 'index']);
    Route::get('car', [CarController::class, 'index']);
    Route::get('car/{car}/availability', [CarAvailabilityController::class, 'index']);
});
