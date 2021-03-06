<?php

namespace App\Support;

use Route;
use Illuminate\Support\Str;

class Active
{
    /**
     * Compares given route name with current route name.
     *
     * @param  string  $routeName
     * @return bool
     */
    public static function isActiveRoute($routeName)
    {
        return Route::currentRouteName() === $routeName;
    }

    /**
     * Compares given route name with current route name.
     *
     * @param  string  $routeName
     * @return bool
     */
    public static function isActiveRouteResourceName($resourceName)
    {
        return Str::startsWith(Route::currentRouteName(), $resourceName);
    }
}
