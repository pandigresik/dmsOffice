<?php

namespace App\Providers;
use App\Models\Inventory\StockPicking;
use App\Models\Accounting\AccountJournal;
use App\Models\Base\Vendor;
use App\Models\Accounting\DefaultCreditAccount;
use App\Models\Accounting\DefaultDebitAccount;
use App\Models\Base\Company;

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
