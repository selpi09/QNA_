<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate, max-age=0');
        $response->headers->set('Pregma','no-cache');
        $response->headers->set('Expires','Sun, 01 Jan 2000 00:00:00 GMT');
        
        return $response;
    }
}