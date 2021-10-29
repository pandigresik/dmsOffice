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
        Route::resource('import', App\Http\Controllers\Base\ImportController::class, ['as' => 'base']);
        Route::resource('export', App\Http\Controllers\Base\ExportController::class, ['as' => 'base']);
        Route::resource('roles', App\Http\Controllers\Base\RoleController::class, ['as' => 'base']);
        Route::resource('permissions', App\Http\Controllers\Base\PermissionController::class, ['as' => 'base']);
        Route::resource('users', App\Http\Controllers\Base\UserController::class, ['as' => 'base']);
        Route::resource('menus', App\Http\Controllers\Base\MenusController::class, ['as' => 'base']);
        // Route::resource('menuPermissions', App\Http\Controllers\Base\MenuPermissionsController::class, ["as" => 'base']);
        Route::resource('vehicleGroups', App\Http\Controllers\Base\VehicleGroupController::class, ['as' => 'base']);
        Route::resource('vendors', App\Http\Controllers\Base\VendorController::class, ['as' => 'base']);
        Route::resource('vendorsContacts', App\Http\Controllers\Base\VendorContactController::class, ["as" => 'base']);
        //Route::get('vendors/contacts/form/{json?}', 'App\Http\Controllers\Base\VendorContactController@form')->name('base.vendors.contacts.form');
        Route::resource('vendorsLocations', App\Http\Controllers\Base\VendorLocationController::class, ["as" => 'base']);
        //Route::get('vendors/locations/form/{json?}', 'App\Http\Controllers\Base\VendorLocationController@form')->name('base.vendors.locations.form');
        Route::resource('vendorsVehicles', App\Http\Controllers\Base\VehicleController::class, ['as' => 'base']);
        //Route::get('vendors/vehicles/form/{json?}', 'App\Http\Controllers\Base\VehicleController@form')->name('base.vendors.vehicles.form');
        //Route::resource('vehicles', App\Http\Controllers\Base\VehicleController::class, ['as' => 'base']);
        Route::resource('cities', App\Http\Controllers\Base\CityController::class, ['as' => 'base']);
        Route::resource('routeTrips', App\Http\Controllers\Base\RouteTripController::class, ['as' => 'base']);

        Route::resource('companies', App\Http\Controllers\Base\CompanyController::class, ['as' => 'base']);
        Route::resource('uomCategories', App\Http\Controllers\Base\UomCategoryController::class, ['as' => 'base']);
        Route::resource('uoms', App\Http\Controllers\Base\UomController::class, ['as' => 'base']);
        Route::resource('settings', App\Http\Controllers\Base\SettingController::class, ['as' => 'base']);
        Route::resource('products', App\Http\Controllers\Base\ProductController::class, ['as' => 'base']);

        /** DMS Table */            
        Route::resource('dmsApSuppliers', App\Http\Controllers\Base\DmsApSupplierController::class, ["as" => 'base']);
        Route::resource('dmsArCustomers', App\Http\Controllers\Base\DmsArCustomerController::class, ["as" => 'base']);
        Route::resource('dmsArCustomercategories', App\Http\Controllers\Base\DmsArCustomercategoryController::class, ["as" => 'base']);
        Route::resource('dmsArCustomercategorytypes', App\Http\Controllers\Base\DmsArCustomercategorytypeController::class, ["as" => 'base']);
        Route::resource('dmsArCustomerhierarchies', App\Http\Controllers\Base\DmsArCustomerhierarchyController::class, ["as" => 'base']);
        Route::resource('dmsArCustomerrouteinfos', App\Http\Controllers\Base\DmsArCustomerrouteinfoController::class, ["as" => 'base']);
        Route::resource('dmsArDoccustomers', App\Http\Controllers\Base\DmsArDoccustomerController::class, ["as" => 'base']);
        Route::resource('dmsArPaymentterms', App\Http\Controllers\Base\DmsArPaymenttermController::class, ["as" => 'base']);
        Route::resource('dmsArPaymenttypes', App\Http\Controllers\Base\DmsArPaymenttypeController::class, ["as" => 'base']);
        Route::resource('dmsArPricesegments', App\Http\Controllers\Base\DmsArPricesegmentController::class, ["as" => 'base']);
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
        Route::resource('btbViewTmps', App\Http\Controllers\Inventory\BtbViewTmpController::class, ["as" => 'inventory']);

        /** DMS Table */
        Route::resource('dmsInvCarriers', App\Http\Controllers\Inventory\DmsInvCarrierController::class, ["as" => 'inventory']);
        Route::resource('dmsInvCarrierdrivers', App\Http\Controllers\Inventory\DmsInvCarrierdriverController::class, ["as" => 'inventory']);
        Route::resource('dmsInvCarriervehicles', App\Http\Controllers\Inventory\DmsInvCarriervehicleController::class, ["as" => 'inventory']);
        Route::resource('dmsInvProducts', App\Http\Controllers\Inventory\DmsInvProductController::class, ["as" => 'inventory']);
        Route::resource('dmsInvProductcategories', App\Http\Controllers\Inventory\DmsInvProductcategoryController::class, ["as" => 'inventory']);
        Route::resource('dmsInvProductcategorytypes', App\Http\Controllers\Inventory\DmsInvProductcategorytypeController::class, ["as" => 'inventory']);
        Route::resource('dmsInvProductitemcategories', App\Http\Controllers\Inventory\DmsInvProductitemcategoryController::class, ["as" => 'inventory']);
        Route::resource('dmsInvProductkitinfos', App\Http\Controllers\Inventory\DmsInvProductkitinfoController::class, ["as" => 'inventory']);
        Route::resource('dmsInvUoms', App\Http\Controllers\Inventory\DmsInvUomController::class, ["as" => 'inventory']);
        Route::resource('dmsInvVehicles', App\Http\Controllers\Inventory\DmsInvVehicleController::class, ["as" => 'inventory']);
        Route::resource('dmsInvVehicletypes', App\Http\Controllers\Inventory\DmsInvVehicletypeController::class, ["as" => 'inventory']);
        Route::resource('dmsInvWarehouses', App\Http\Controllers\Inventory\DmsInvWarehouseController::class, ["as" => 'inventory']);
    });

    Route::group(['prefix' => 'accounting'], function () {
        Route::resource('ifrsAccounts', App\Http\Controllers\Accounting\IfrsAccountsController::class, ['as' => 'accounting']);
        Route::resource('ifrsCategories', App\Http\Controllers\Accounting\IfrsCategoriesController::class, ['as' => 'accounting']);
        Route::resource('ifrsEntities', App\Http\Controllers\Accounting\IfrsEntitiesController::class, ['as' => 'accounting']);
        Route::resource('ifrsCurrencies', App\Http\Controllers\Accounting\IfrsCurrenciesController::class, ['as' => 'accounting']);
        Route::resource('ifrsExchangeRates', App\Http\Controllers\Accounting\IfrsExchangeRatesController::class, ['as' => 'accounting']);
        Route::resource('ifrsReportingPeriods', App\Http\Controllers\Accounting\IfrsReportingPeriodsController::class, ['as' => 'accounting']);
        Route::resource('ifrsVats', App\Http\Controllers\Accounting\IfrsVatsController::class, ['as' => 'accounting']);
        /** Table DMS */
        Route::resource('dmsFinAccounts', App\Http\Controllers\Accounting\DmsFinAccountController::class, ["as" => 'accounting']);
        Route::resource('dmsFinSubaccounts', App\Http\Controllers\Accounting\DmsFinSubaccountController::class, ["as" => 'accounting']);
    });

    Route::group(['prefix' => 'sales'], function () {
        Route::resource('dmsSdPricecatalogs', App\Http\Controllers\Sales\DmsSdPricecatalogController::class, ["as" => 'sales']);
        Route::resource('dmsSdRoutes', App\Http\Controllers\Sales\DmsSdRouteController::class, ["as" => 'sales']);
        Route::resource('dmsSdRouteitems', App\Http\Controllers\Sales\DmsSdRouteitemController::class, ["as" => 'sales']);
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

Route::match(['get', 'post'],'/demo', [App\Http\Controllers\DemoAccountingController::class, 'index'])->name('demo');    






