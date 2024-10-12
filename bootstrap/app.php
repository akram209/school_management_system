<?php

use App\Http\Middleware\Authenticated;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isParent;
use App\Http\Middleware\isTeacher;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authed' => Authenticated::class,
            'isAdmin' => isAdmin::class,
            'isTeacher' => isTeacher::class,
            'isParent' => isParent::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
