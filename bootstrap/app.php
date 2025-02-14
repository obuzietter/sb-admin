<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function (Request $request) {
            // Check if the request is for an admin route
            if ($request->is('admin/*') ) {
                return route('show.admin.login'); // Redirect admins to admin login
            }
    
            return route('login'); // Default for regular users
        });

        $middleware->redirectUsersTo(function (Request $request) {
            // Check if the request is for an admin route
            if ($request->is('admin/*')) {
                return route('admin.dashboard'); // Redirect admins to admin dashboard
            }
    
            return route('home'); // Default for regular users
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
