<?php

use App\Http\Middleware\AuthApi;
use App\Http\Middleware\CheckLoginAdmin;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\ProductPermission;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(CheckPermission::class);
        // $middleware->append(CheckLoginAdmin::class);
        // $middleware->append(AuthApi::class);
        $middleware->appendToGroup('halo', [ProductPermission::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
