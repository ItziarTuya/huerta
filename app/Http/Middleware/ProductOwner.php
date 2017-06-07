<?php

namespace huerta\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProductOwner
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
        if ( Auth::check() && (Auth::user()->isProductOwner($request->route()->parameter('product')) || Auth::user()->isAdmin()) )
        {
            return $next($request);
        }

        return redirect('error/forbidden');
    }
}
