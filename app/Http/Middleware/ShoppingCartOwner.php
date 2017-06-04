<?php

namespace huerta\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShoppingCartOwner
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
        if ( Auth::check() && Auth::user()->isShoppingCartOwner($request->route()->parameter('shoppingCart')) )
        {
            return $next($request);
        }

        return redirect('shop/index');
    }
}