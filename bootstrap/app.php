<?php

use App\Http\Middleware\ChechRoute;
use App\Http\Middleware\CheckReq;
use App\Http\Middleware\EnhanceReq;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
//        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->priority([
           CheckReq::class,
           EnhanceReq::class,
        ]);
//
        $middleware->prepend(CheckReq::class.':adsfsafd,second_param');
        $middleware->append(EnhanceReq::class);

        $middleware->alias(['check_req' => CheckReq::class,
            'check_role' => ChechRoute::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
