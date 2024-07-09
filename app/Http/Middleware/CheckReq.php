<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Log\LogManager;
use Symfony\Component\HttpFoundation\Response;

class CheckReq
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $param): Response
    {
        $request->attributes->set('additional_str', $param);
        /** @var $response \Illuminate\Http\Response */
        $response = $next($request);
        $content = $response->content();
        $response->setStatusCode(201);
        $response->setContent($content.$param);

        return $response;
    }

    public function terminate($req, $res)
    {
        $logManager = app(LogManager::class);

        $logManager->debug(CheckReq::class.'@terminate');
    }
}
