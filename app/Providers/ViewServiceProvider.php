<?php

namespace App\Providers;

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
        // View::composer(['hris.employees.fields'], function ($view) {
        //     $companyItems = Company::pluck('id')->toArray();
        //     $view->with('companyItems', $companyItems);
        // });
        //
    }
}
