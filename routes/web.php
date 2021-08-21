<?php

use Illuminate\Support\Facades\Route; /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['auth','role:administrator']],function (){
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'base'], function () {
        Route::resource('roles', App\Http\Controllers\Base\RoleController::class, ['as' => 'base']);
        Route::resource('permissions', App\Http\Controllers\Base\PermissionController::class, ['as' => 'base']);
        Route::resource('users', App\Http\Controllers\Base\UserController::class, ['as' => 'base']);
        Route::resource('menus', App\Http\Controllers\Base\MenusController::class, ['as' => 'base']);
        // Route::resource('menuPermissions', App\Http\Controllers\Base\MenuPermissionsController::class, ["as" => 'base']);
        Route::resource('vehicleGroups', App\Http\Controllers\Base\VehicleGroupController::class, ['as' => 'base']);
        Route::resource('Vendors', App\Http\Controllers\Base\VendorController::class, ['as' => 'base']);
        Route::resource('Vendors.vehicles', App\Http\Controllers\Base\VehicleController::class, ['as' => 'base']);
        Route::resource('cities', App\Http\Controllers\Base\CityController::class, ['as' => 'base']);
        Route::resource('routeTrips', App\Http\Controllers\Base\RouteTripController::class, ['as' => 'base']);

        Route::resource('companies', App\Http\Controllers\Base\CompanyController::class, ['as' => 'base']);
        Route::resource('uomCategories', App\Http\Controllers\Base\UomCategoryController::class, ['as' => 'base']);
        Route::resource('uoms', App\Http\Controllers\Base\UomController::class, ['as' => 'base']);
        Route::resource('settings', App\Http\Controllers\Base\SettingController::class, ['as' => 'base']);
        Route::resource('products', App\Http\Controllers\Base\ProductController::class, ['as' => 'base']);
    });

    Route::group(['prefix' => 'inventory'], function () {
        Route::resource('warehouses', App\Http\Controllers\Inventory\WarehouseController::class, ['as' => 'inventory']);
        Route::resource('stockQuants', App\Http\Controllers\Inventory\StockQuantController::class, ['as' => 'inventory']);
        Route::get('stockInventories/stockWarehouse', [App\Http\Controllers\Inventory\StockInventoryController::class, 'stockWarehouse'], ['as' => 'inventory'])->name('inventory.stockInventories.stockWarehouse');
        Route::resource('stockInventories', App\Http\Controllers\Inventory\StockInventoryController::class, ['as' => 'inventory']);
        Route::resource('stockPickingTypes', App\Http\Controllers\Inventory\StockPickingTypeController::class, ['as' => 'inventory']);
        Route::resource('stockPickings', App\Http\Controllers\Inventory\StockPickingController::class, ['as' => 'inventory']);
        Route::resource('synchronizeInStockPickings', App\Http\Controllers\Inventory\SynchronizeInStockPickingController::class, ['as' => 'inventory']);
        Route::resource('synchronizeOutStockPickings', App\Http\Controllers\Inventory\SynchronizeOutStockPickingController::class, ['as' => 'inventory']);
    });

    Route::group(['prefix' => 'accounting'], function () {
        Route::resource('accountAccounts', App\Http\Controllers\Accounting\AccountAccountController::class, ['as' => 'accounting']);
        Route::resource('accountTypes', App\Http\Controllers\Accounting\AccountTypeController::class, ['as' => 'accounting']);
        Route::resource('accountJournals', App\Http\Controllers\Accounting\AccountJournalController::class, ['as' => 'accounting']);
        Route::resource('accountInvoices', App\Http\Controllers\Accounting\AccountInvoiceController::class, ['as' => 'accounting']);
        Route::resource('accountMoves', App\Http\Controllers\Accounting\AccountMoveController::class, ['as' => 'accounting']);
    });
    Route::get('/selectAjax', [App\Http\Controllers\SelectAjaxController::class, 'index'])->name('selectAjax');
    Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
});

// builder generator
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback'); Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');
