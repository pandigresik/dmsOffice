<?php

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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {    
    Route::resource('menus', Base\MenusAPIController::class);    
    Route::resource('vendor_expeditions', Base\VendorExpeditionAPIController::class);
    Route::resource('cities', Base\CityAPIController::class);
    Route::resource('route_trips', Base\RouteTripAPIController::class);
    Route::resource('vehicle_groups', Base\VehicleGroupAPIController::class);
    Route::resource('vendor_expedition_trips', Base\VendorExpeditionTripAPIController::class);
    Route::resource('vehicles', Base\VehicleAPIController::class);
});