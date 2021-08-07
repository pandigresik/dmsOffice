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
    Route::resource('bookable_bookings', App\Http\Controllers\API\BookableBookingsAPIController::class);
    Route::resource('bookable_availabilities', App\Http\Controllers\API\BookableAvailabilitiesAPIController::class);
    Route::resource('menus', App\Http\Controllers\API\MenusAPIController::class);
    Route::resource('menu_permissions', App\Http\Controllers\API\MenuPermissionsAPIController::class);
});



Route::resource('customers', App\Http\Controllers\API\CustomersAPIController::class);