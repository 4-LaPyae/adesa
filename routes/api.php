<?php

use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\CarMakeController;
use App\Http\Controllers\Car\CarModelController;
use App\Http\Controllers\Car\FuelTypeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('carmakes',CarMakeController::class);
Route::post('search/carmakes',[CarMakeController::class,'searchCarMakes']);
Route::resource('carmodels',CarModelController::class);
Route::post('search/carmodels',[CarModelController::class,'searchCarModels']);
Route::resource('/cars',CarController::class);
Route::resource('fueltypes',FuelTypeController::class);

