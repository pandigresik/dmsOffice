<?php

namespace App\Providers;
use App\Models\Inventory\Product;

use App\Models\Finance\Partner;
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
        View::composer(['inventory.product_stock.fields'], function ($view) {
            $productItems = Product::pluck('id')->toArray();
            $view->with('productItems', $productItems);
        });
        // View::composer(['finance.debit_credit_note.fields'], function ($view) {
        //     $partnerItems = Partner::pluck('id')->toArray();
        //     $view->with('partnerItems', $partnerItems);
        // });
    }
}
