<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Directives\IsDeveloperDirective;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', "App\Http\ViewComposers\GoogleUserInfo");
        IsDeveloperDirective::register();
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');
    }
}
