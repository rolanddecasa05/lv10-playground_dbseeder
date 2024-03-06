<?php

namespace App\Providers;

use App\Pgmodules\Services\Playground;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(Playground::class, function($app) {
            return new Playground(currency: 'eur');
        });
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
