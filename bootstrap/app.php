<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up'
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Définir un alias pour le middleware de rôle
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Gérer les exceptions ici si nécessaire
    })
    ->create();
