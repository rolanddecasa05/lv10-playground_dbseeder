<?php

namespace App\Providers;

use App\Pgmodules\Contracts\EloquentRepositoryInterface;
use App\Pgmodules\Repositories\EloquentRepository;
use App\Pgmodules\Contracts\UserCrudInterface;
use App\Pgmodules\Repositories\UserCrudRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, EloquentRepository::class); // --> base crud
        $this->app->bind(UserCrudInterface::class, UserCrudRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
