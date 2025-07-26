<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/adminAuth.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function ($router) {
            $router->group([
                'prefix' => 'admin',
                'middleware' => ['web'],
                'as' => 'admin.',
                'namespace' => 'App\\Http\\Controllers\\Auth',
            ], function () {
                require base_path('routes/admin.php');
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
