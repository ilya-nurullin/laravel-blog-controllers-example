<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnhanceReq
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $additional_str = $request->attributes->get('additional_str');
        if ($request->has('api_token'))
        {
            $request->attributes->set('token', $additional_str.':'.$request->input('api_token'));
        }
        return $next($request);
    }
}
