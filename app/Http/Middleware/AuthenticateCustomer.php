<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateCustomer
{
    public function handle($request, Closure $next)
    {
        //If request does not comes from logged in customer
        //then he shall be redirected to customer Login page
        if (!Auth::guard('customer')->check()) {
            return route('customer.login');
        }
        return $next($request);
    }
}