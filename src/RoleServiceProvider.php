<?php

namespace Putheng\Role;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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

        Blade::if('role', function($role){
            return auth()->check() && auth()->user()->hasRole($role);
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
