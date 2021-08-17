<?php

namespace App\Providers;
use App\Models\Inventory\Vendor;
use App\Models\Inventory\StockPickingType;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use App\Models\Inventory\Product;
use App\Models\Inventory\Company;
use App\Models\Base\UomCategory;

use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer(['inventory.stock_picking.fields'], function ($view) {
            $vendorItems = Vendor::pluck('id')->toArray();
            $view->with('vendorItems', $vendorItems);
        });
        View::composer(['inventory.stock_picking.fields'], function ($view) {
            $stockPickingTypeItems = StockPickingType::pluck('id')->toArray();
            $view->with('stockPickingTypeItems', $stockPickingTypeItems);
        });
        View::composer(['inventory.stock_picking.fields'], function ($view) {
            $warehouseItems = Warehouse::pluck('id')->toArray();
            $view->with('warehouseItems', $warehouseItems);
        });
        View::composer(['inventory.stock_inventory.fields'], function ($view) {
            $warehouseItems = Warehouse::pluck('id')->toArray();
            $view->with('warehouseItems', $warehouseItems);
        });
        View::composer(['inventory.stock_quant.fields'], function ($view) {
            $uomItems = Uom::pluck('id')->toArray();
            $view->with('uomItems', $uomItems);
        });
        View::composer(['inventory.stock_quant.fields'], function ($view) {
            $warehouseItems = Warehouse::pluck('id')->toArray();
            $view->with('warehouseItems', $warehouseItems);
        });
        View::composer(['inventory.stock_quant.fields'], function ($view) {
            $productItems = Product::pluck('id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['inventory.warehouse.fields'], function ($view) {
            $companyItems = Company::pluck('id')->toArray();
            $view->with('companyItems', $companyItems);
        });
        View::composer(['inventory.warehouse.fields'], function ($view) {
            $companyItems = Company::pluck('id')->toArray();
            $view->with('companyItems', $companyItems);
        });
        View::composer(['base.uom.fields'], function ($view) {
            $uomCategoryItems = UomCategory::pluck('id')->toArray();
            $view->with('uomCategoryItems', $uomCategoryItems);
        });
        // View::composer(['hris.employees.fields'], function ($view) {
        //     $companyItems = Company::pluck('id')->toArray();
        //     $view->with('companyItems', $companyItems);
        // });
        //
    }
}
