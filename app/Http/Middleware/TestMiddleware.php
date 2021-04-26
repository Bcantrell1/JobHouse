<?php

/*
 * Project Name: Milestone 6
 * Version: 6.0
 * Programmers: Brian Cantrell
 * Date: 4/24/2021
 */

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Closure;


class TestMiddleware
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
        
        if($request->email != null)
        {
            $value = Cache::store("file")->get("mydata");
            if($value == null)
            {
                Log::info("Caching first time email for " . $request->email);
                Cache::store("file")->put("mydata", $request->email, 1);
            }
        }
        else
        {
            $value = Cache::store("file")->get("mydata");
            if($value != null)
            Log::info("Getting email from cache  " . $value);
                else
                Log::info("Could not get email from cache (data is older than 1 min)");
        }
        return $next($request);
        
    }
}