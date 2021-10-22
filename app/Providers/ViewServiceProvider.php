<?php

namespace App\Providers;
use App\Models\Base\RouteTrip;

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
        // View::composer(['accounting.account_move.fields'], function ($view) {
        //     $stockPickingItems = StockPicking::pluck('id')->toArray();
        //     $view->with('stockPickingItems', $stockPickingItems);
        // });
    }
}
