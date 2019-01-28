<?php

namespace Putheng\Role;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        Blade::if('role', function(...$roles){
            return auth()->check() && auth()->user()->hasRole(array_flatten($roles));
        });

        Blade::if('permission', function(...$permissions){
            return auth()->check() && auth()->user()->can(array_flatten($permissions));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
