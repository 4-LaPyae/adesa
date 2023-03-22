<?php

use App\Http\Controllers\Car\AuctionTypeController;
use App\Http\Controllers\Car\BodyTypeController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\CarHpKwController;
use App\Http\Controllers\Car\CarMakeController;
use App\Http\Controllers\Car\CarModelController;
use App\Http\Controllers\Car\CarPowerController;
use App\Http\Controllers\Car\ColourController;
use App\Http\Controllers\Car\DamageController;
use App\Http\Controllers\Car\EngineSizeController;
use App\Http\Controllers\Car\EquipmentController;
use App\Http\Controllers\Car\FuelTypeController;
use App\Http\Controllers\Car\HpController;
use App\Http\Controllers\Car\KwController;
use App\Http\Controllers\Car\SellerController;
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
Route::post('store/image',[CarController::class,'storeImage']);
Route::resource('fueltypes',FuelTypeController::class);
Route::resource('bodytypes',BodyTypeController::class);
Route::resource('powers',CarPowerController::class);
Route::resource('hps',HpController::class);
Route::resource('kws',KwController::class);
Route::resource('equipment',EquipmentController::class);
Route::resource('colours',ColourController::class);
Route::resource('damages', DamageController::class);
Route::resource('auction_types',AuctionTypeController::class);
Route::resource('sellers',SellerController::class);
Route::resource('engine-sizes',EngineSizeController::class);

