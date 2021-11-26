<?php

namespace App\Providers;
use App\Models\Purchase\Partner;
use App\Models\Purchase\Uom;
use App\Models\Purchase\Product;
use App\Models\Purchase\Doc;

use App\Models\Base\DmsApSupplier;
use App\Models\Base\DmsArCustomer;
use App\Models\Inventory\DmsInvCarrier;
use App\Models\Inventory\DmsInvVehicle;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {        
        
        // View::composer(['base.location_customer.fields'], function ($view) {
        //     $dmsArCustomerItems = DmsArCustomer::pluck('id')->toArray();
        //     $view->with('dmsArCustomerItems', $dmsArCustomerItems);
        // });
        // View::composer(['base.contact_customer.fields'], function ($view) {
        //     $dmsArCustomerItems = DmsArCustomer::pluck('id')->toArray();
        //     $view->with('dmsArCustomerItems', $dmsArCustomerItems);
        // });
        // View::composer(['base.location_supplier.fields'], function ($view) {
        //     $dmsApSupplierItems = DmsApSupplier::pluck('id')->toArray();
        //     $view->with('dmsApSupplierItems', $dmsApSupplierItems);
        // });
        // View::composer(['base.contact_supplier.fields'], function ($view) {
        //     $dmsApSupplierItems = DmsApSupplier::pluck('id')->toArray();
        //     $view->with('dmsApSupplierItems', $dmsApSupplierItems);
        // });
        // View::composer(['inventory.location_ekspedisi.fields'], function ($view) {
        //     $dmsInvCarrierItems = DmsInvCarrier::pluck('id')->toArray();
        //     $view->with('dmsInvCarrierItems', $dmsInvCarrierItems);
        // });
        // View::composer(['inventory.contact_ekspedisi.fields'], function ($view) {
        //     $dmsInvCarrierItems = DmsInvCarrier::pluck('id')->toArray();
        //     $view->with('dmsInvCarrierItems', $dmsInvCarrierItems);
        // });
        // View::composer(['inventory.vehicle_ekspedisi.fields'], function ($view) {
        //     $dmsInvVehicleItems = DmsInvVehicle::pluck('id')->toArray();
        //     $view->with('dmsInvVehicleItems', $dmsInvVehicleItems);
        // });
        // View::composer(['accounting.account_move.fields'], function ($view) {
        //     $stockPickingItems = StockPicking::pluck('id')->toArray();
        //     $view->with('stockPickingItems', $stockPickingItems);
        // });
    }
}
