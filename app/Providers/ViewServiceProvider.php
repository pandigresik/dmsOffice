<?php

namespace App\Providers;
use App\Models\Purchase\Uom;
use App\Models\Purchase\Product;
use App\Models\Purchase\Reference;
use App\Models\Purchase\Doc;
use App\Models\Purchase\Invoice;

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
    }
}
