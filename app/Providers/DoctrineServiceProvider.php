<?php

namespace App\Providers;

use Doctrine\DBAL\Types\Type;
use Illuminate\Support\ServiceProvider;

class DoctrineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        if (!Type::hasType('uuid')) {
            Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');
        }
    }
}
