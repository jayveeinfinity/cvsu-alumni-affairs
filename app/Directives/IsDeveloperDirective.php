<?php

namespace App\Directives;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class IsDeveloperDirective
{
    public static function register()
    {
        Blade::if('isDev', function () {
            return Auth::check() && Auth::user()->email === "jayveeinfinity@gmail.com";
        });
    }
}
