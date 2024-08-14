<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Middleware\TokenCheckMiddleware;
use App\Http\Middleware\CustomerIdentificationMiddleware;
use App\Http\Middleware\AdminIdentificationMiddleware;
use App\Http\Middleware\ResetPasswordMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: ['*']);
        $middleware->alias([
            'auth' => TokenVerificationMiddleware::class,
            'check' => TokenCheckMiddleware::class,
            'customer' => CustomerIdentificationMiddleware::class,
            'admin' => AdminIdentificationMiddleware::class,
            'reset-pass' => ResetPasswordMiddleware::class
        ]);
    })
    ->create();
