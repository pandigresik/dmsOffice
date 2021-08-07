<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Doctrine\DBAL\Types\Type;
class DoctrineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(!Type::hasType('uuid')){
            Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');
        }
        
    }
}
