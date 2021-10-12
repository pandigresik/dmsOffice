<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; /*
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
    Route::resource('vendor_expeditions', Base\VendorAPIController::class);
    Route::resource('cities', Base\CityAPIController::class);
    Route::resource('route_trips', Base\RouteTripAPIController::class);
    Route::resource('vehicle_groups', Base\VehicleGroupAPIController::class);
    Route::resource('vehicles', Base\VehicleAPIController::class);

    Route::resource('ifrs_accounts', Accounting\IfrsAccountsAPIController::class);
    Route::resource('ifrs_categories', Accounting\IfrsCategoriesAPIController::class);
    Route::resource('ifrs_entities', Accounting\IfrsEntitiesAPIController::class);
    Route::resource('ifrs_currencies', Accounting\IfrsCurrenciesAPIController::class);
    Route::resource('ifrs_exchange_rates', Accounting\IfrsExchangeRatesAPIController::class);
    Route::resource('ifrs_reporting_periods', Accounting\IfrsReportingPeriodsAPIController::class);
    Route::resource('ifrs_vats', Accounting\IfrsVatsAPIController::class);
});


Route::group(['prefix' => 'inventory'], function () {
    Route::resource('btb_view_tmps', App\Http\Controllers\API\Inventory\Inventory\BtbViewTmpAPIController::class);
});
