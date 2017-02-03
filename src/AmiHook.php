<?php

namespace Enniel\AmiHook;

use Illuminate\Support\Facades\Route;

class AmiHook
{

    /**
     * Get a Asterisk route registrar.
     *
     * @param  array  $options
     * @return RouteRegistrar
     */
    public static function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };
        $options = array_merge($options, [
            'middleware' => 'auth',
            'namespace' => '\Enniel\AmiHook\Http\Controllers',
        ]);
        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
}
