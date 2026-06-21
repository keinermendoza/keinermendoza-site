<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
        // Habilita cookies para o SPA
        $middleware->statefulApi();

        // proporciona funções os string para construir as redireções
        $middleware->redirectTo(
            guests: '/login',
            users: fn () => config('app.frontend_url')
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
