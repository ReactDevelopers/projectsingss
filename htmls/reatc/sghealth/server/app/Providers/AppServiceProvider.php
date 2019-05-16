<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\PermissionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        ini_set('memory_limit', '-1');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->singleton('permission', function ($app) {
            return new PermissionRepository();
        });
    }
}
