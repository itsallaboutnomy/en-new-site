<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateVisitor
{
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('guest-'.str_replace('.','',$request->ip()))){
            return redirect()->route('guest-visitor');
        }

        return $next($request);
    }
}
