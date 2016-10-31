<?php

namespace App\Http\Middleware;

use Closure, Session;

class language
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
        if(Session::get('lang') == 'en'){
            app()->setlocale('en');
        }
        return $next($request);
    }
}
