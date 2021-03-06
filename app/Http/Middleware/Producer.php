<?php

namespace huerta\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Producer
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
        if ( Auth::check() && (Auth::user()->isProducer() || Auth::user()->isAdmin()) )
        {
            return $next($request);
        }

        return redirect('error/forbidden');
    }
}
