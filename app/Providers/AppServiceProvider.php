<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Directives\IsDeveloperDirective;

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
        view()->composer('*', function ($view) {
            $view->with('isAuthenticated', Auth::check());
            $view->with('currentUser', Auth::user());
        });
        IsDeveloperDirective::register();
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');
    }
}
