<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Log;
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
        Log::info(11);
        User::observe(UserObserver::class);
    }
}
