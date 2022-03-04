<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovementsController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {  
    //auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/all-users', [AuthController::class, 'allUsers']);

    //movements
    Route::get('/movements', [MovementsController::class, 'getMovements']);
    Route::post('/movement/create', [MovementsController::class, 'createMovement']);
    Route::get('/balance', [MovementsController::class, 'getBalance']);
});

