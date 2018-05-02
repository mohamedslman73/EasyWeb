<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
        $langCode   = $request->segment(1);
        $available  = ['ar','en'];
        if(!in_array($langCode,$available)){
            return redirect('/'.app()->getLocale());
        }
        app()->setLocale($langCode);
        return $next($request);
    }
}
