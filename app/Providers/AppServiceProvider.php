<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin() ?? false;
        });

        Blade::if('user', function () {
            $user = auth()->user();
            return (auth()->check() && $user->isUser() || $user->isVendor() || $user->isAdmin()) ?? false;
        });
    }
}
