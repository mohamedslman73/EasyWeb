<?php

namespace App\Http\Middleware;

use Closure;

class UrlRedirect
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
        $req=strpos(url()->current(),'/server.php/');
        if ($req!=false){
            $redirect=str_replace('/server.php/','/',url()->current());
            return redirect($redirect);
        }
        return $next($request);
    }
}
