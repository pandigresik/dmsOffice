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
Route::get('/tes', [App\Http\Controllers\HomeController::class, 'tes']);

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
        // Route::resource('vehicleGroups', App\Http\Controllers\Base\VehicleGroupController::class, ['as' => 'base']);
        // Route::resource('vendors', App\Http\Controllers\Base\VendorController::class, ['as' => 'base']);
        // Route::resource('vendorsContacts', App\Http\Controllers\Base\VendorContactController::class, ["as" => 'base']);
        //Route::get('vendors/contacts/form/{json?}', 'App\Http\Controllers\Base\VendorContactController@form')->name('base.vendors.contacts.form');
        //Route::resource('vendorsLocations', App\Http\Controllers\Base\VendorLocationController::class, ["as" => 'base']);
        //Route::get('vendors/locations/form/{json?}', 'App\Http\Controllers\Base\VendorLocationController@form')->name('base.vendors.locations.form');
        //Route::resource('vendorsVehicles', App\Http\Controllers\Base\VehicleController::class, ['as' => 'base']);
        //Route::get('vendors/vehicles/form/{json?}', 'App\Http\Controllers\Base\VehicleController@form')->name('base.vendors.vehicles.form');
        //Route::resource('vehicles', App\Http\Controllers\Base\VehicleController::class, ['as' => 'base']);
        Route::resource('cities', App\Http\Controllers\Base\CityController::class, ['as' => 'base']);
        Route::resource('trips', App\Http\Controllers\Base\TripController::class, ["as" => 'base']);
        Route::resource('entities', App\Http\Controllers\Base\EntityController::class, ["as" => 'base']);
                
        Route::resource('settings', App\Http\Controllers\Base\SettingController::class, ['as' => 'base']);
        //Route::resource('products', App\Http\Controllers\Base\ProductController::class, ['as' => 'base']);
        Route::resource('locations', App\Http\Controllers\Base\LocationController::class, ["as" => 'base']);

        /** DMS Table */
        Route::resource('dmsSmBranches', App\Http\Controllers\Base\DmsSmBranchController::class, ["as" => 'base']);            
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

        Route::resource('contactSuppliers', App\Http\Controllers\Base\ContactSupplierController::class, ["as" => 'base']);
        Route::resource('locationSuppliers', App\Http\Controllers\Base\LocationSupplierController::class, ["as" => 'base']);
        Route::resource('contactCustomers', App\Http\Controllers\Base\ContactCustomerController::class, ["as" => 'base']);
        Route::resource('locationCustomers', App\Http\Controllers\Base\LocationCustomerController::class, ["as" => 'base']);
    });

    Route::group(['prefix' => 'inventory'], function () {        
        Route::resource('synchronizeInStockPickings', App\Http\Controllers\Inventory\SynchronizeInStockPickingController::class, ['as' => 'inventory']);
        Route::resource('synchronizeOutStockPickings', App\Http\Controllers\Inventory\SynchronizeOutStockPickingController::class, ['as' => 'inventory']);
        Route::resource('btbViewTmps', App\Http\Controllers\Inventory\BtbViewTmpController::class, ["as" => 'inventory']);
        
        /** DMS Table */
        Route::resource('dmsInvCarriers', App\Http\Controllers\Inventory\DmsInvCarrierController::class, ["as" => 'inventory']);
        // Route::resource('dmsInvCarrierdrivers', App\Http\Controllers\Inventory\DmsInvCarrierdriverController::class, ["as" => 'inventory']);
        // Route::resource('dmsInvCarriervehicles', App\Http\Controllers\Inventory\DmsInvCarriervehicleController::class, ["as" => 'inventory']);
        Route::resource('dmsInvProducts', App\Http\Controllers\Inventory\DmsInvProductController::class, ["as" => 'inventory']);
        // Route::resource('dmsInvProductcategories', App\Http\Controllers\Inventory\DmsInvProductcategoryController::class, ["as" => 'inventory']);
        // Route::resource('dmsInvProductcategorytypes', App\Http\Controllers\Inventory\DmsInvProductcategorytypeController::class, ["as" => 'inventory']);
        // Route::resource('dmsInvProductitemcategories', App\Http\Controllers\Inventory\DmsInvProductitemcategoryController::class, ["as" => 'inventory']);
        // Route::resource('dmsInvProductkitinfos', App\Http\Controllers\Inventory\DmsInvProductkitinfoController::class, ["as" => 'inventory']);
        Route::resource('dmsInvUoms', App\Http\Controllers\Inventory\DmsInvUomController::class, ["as" => 'inventory']);
        Route::resource('dmsInvVehicles', App\Http\Controllers\Inventory\DmsInvVehicleController::class, ["as" => 'inventory']);
        Route::resource('dmsInvVehicletypes', App\Http\Controllers\Inventory\DmsInvVehicletypeController::class, ["as" => 'inventory']);
        Route::resource('dmsSmBranches.dmsInvWarehouses', App\Http\Controllers\Inventory\DmsInvWarehouseController::class, ["as" => 'inventory'])->only(['index','show','edit']);

        Route::resource('productCategories', App\Http\Controllers\Inventory\ProductCategoriesController::class, ["as" => 'inventory']);
        Route::resource('productCategoriesProducts', App\Http\Controllers\Inventory\ProductCategoriesProductController::class, ["as" => 'inventory']);
        Route::resource('productPrices', App\Http\Controllers\Inventory\ProductPriceController::class, ["as" => 'inventory'])->only(['index','create','edit','store']);
        Route::resource('dmsInvProducts.productPriceLogs', App\Http\Controllers\Inventory\ProductPriceLogController::class, ["as" => 'inventory'])->only(['index']);
        Route::resource('vehicleEkspedisis', App\Http\Controllers\Inventory\VehicleEkspedisiController::class, ["as" => 'inventory']);
        Route::resource('contactEkspedisis', App\Http\Controllers\Inventory\ContactEkspedisiController::class, ["as" => 'inventory']);
        Route::resource('locationEkspedisis', App\Http\Controllers\Inventory\LocationEkspedisiController::class, ["as" => 'inventory']);
        Route::resource('tripEkspedisis', App\Http\Controllers\Inventory\TripEkspedisiController::class, ["as" => 'inventory']);

        /** master discount */
        Route::resource('masterDiscounts', App\Http\Controllers\Inventory\MasterDiscountController::class, ["as" => 'inventory']);
    });

    Route::group(['prefix' => 'accounting'], function () {        
        /** Table DMS */
        Route::resource('dmsFinAccounts', App\Http\Controllers\Accounting\DmsFinAccountController::class, ["as" => 'accounting']);
        Route::resource('dmsFinSubaccounts', App\Http\Controllers\Accounting\DmsFinSubaccountController::class, ["as" => 'accounting']);
    });

    Route::group(['prefix' => 'sales'], function () {
        Route::resource('dmsSdPricecatalogs', App\Http\Controllers\Sales\DmsSdPricecatalogController::class, ["as" => 'sales']);
        Route::resource('dmsSdRoutes', App\Http\Controllers\Sales\DmsSdRouteController::class, ["as" => 'sales']);
        Route::resource('dmsSdRouteitems', App\Http\Controllers\Sales\DmsSdRouteitemController::class, ["as" => 'sales']);
    });

    Route::group(['prefix' => 'purchase'], function () {
        Route::resource('btbValidates', App\Http\Controllers\Purchase\BtbValidateController::class, ["as" => 'purchase']);
        Route::resource('invoices', App\Http\Controllers\Purchase\InvoiceController::class, ["as" => 'purchase']);
    });

    Route::get('/selectAjax', [App\Http\Controllers\SelectAjaxController::class, 'index'])->name('selectAjax');
    Route::get('/events', [App\Http\Controllers\EventsController::class, 'index'])->name('events.index');
});

// builder generator
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback'); 
Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

// Route::match(['get', 'post'],'/demo', [App\Http\Controllers\DemoAccountingController::class, 'index'])->name('demo');

Route::resource('synchronizes', App\Http\Controllers\SynchronizeController::class)->except(['destroy','update', 'edit', 'show']);
Route::get('synchronizes/progress', [App\Http\Controllers\SynchronizeController::class, 'progress'])->name('synchronizes.progress');