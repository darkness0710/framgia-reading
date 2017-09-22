<?php

namespace App\Http\Middleware;

use Closure;
use URL;
use Auth;
use Log;

class AuthenticationRequiredMiddleware
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
        Log::info(URL::previous());
        if (!Auth::check()) {
            return redirect(URL::previous());
        }

        return $next($request);
    }
}
