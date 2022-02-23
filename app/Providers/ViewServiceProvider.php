<?php

namespace App\Providers;
use App\Models\Accounting\Carrier;
use App\Models\Accounting\DestinationBranch;
use App\Models\Accounting\OriginBranch;
use App\Models\Accounting\Account;

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
