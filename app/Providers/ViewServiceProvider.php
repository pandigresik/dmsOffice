<?php

namespace App\Providers;
use App\Models\Sales\DmsPiEmployee;
use App\Models\Sales\DmsArCustomer;
use App\Models\Sales\Doc;
use App\Models\Sales\BundlingDmsInvProduct;
use App\Models\Sales\MainDmsInvProduct;

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
        // View::composer(['finance.debit_credit_note.fields'], function ($view) {
        //     $partnerItems = Partner::pluck('id')->toArray();
        //     $view->with('partnerItems', $partnerItems);
        // });
    }
}
