<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class seller_security
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('seller')){
            return redirect('sellerLogInPage');
        }
        return $next($request);
    }
}
