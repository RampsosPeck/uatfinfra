<?php

namespace Uatfinfra\Http\Middleware;
use Uatfinfra\SocialProfile;
use Closure;

class RedirectIfSocialNetworkNotSupported
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

        if( collect(SocialProfile::$allowed)->contains($request->route('socialNetwork')) ) 
        {
            return $next($request);
        }
        return redirect()->route('login')->with('warning',"No es posible autenticarte con {$request->route('socialNetwork')}");
        
    }
}
