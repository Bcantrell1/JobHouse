<?php

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class SecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        Log::info("Entering Security Middleware in handle() at path: " . $path);
        
        $securityCheck = true;
        if($request->is('/') || $request->is('/login') || $request->is('/dologin'))
        {
            $securityCheck = false;
        }

        Log::info($securityCheck ? "Security Middleware in handle()... Needs Security" : "Security Middleware in handle()... no security needed");
        
        return $next($request);
    }
}