<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\LandingPageController;
use App\Http\Controllers\API\NominalController;
use App\Http\Controllers\API\VoucherController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('category', [CategoryController::class, 'fetch']);
Route::get('nominal', [NominalController::class, 'fetch']);
Route::get('voucher', [VoucherController::class, 'fetch']);
Route::get('players/landingpage', [LandingPageController::class, 'fetch']);
Route::get('players/detail/{id}', [LandingPageController::class, 'detailPage']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
