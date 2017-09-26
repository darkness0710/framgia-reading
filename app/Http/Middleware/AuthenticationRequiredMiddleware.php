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
        if (!Auth::check()) {
            return redirect('error');
        }

        return $next($request);
    }
}
