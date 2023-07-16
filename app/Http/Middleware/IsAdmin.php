<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(isset(auth()->user()->is_admin)){
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        elseif(auth()->user()->is_admin == 2){
        return $next($request);
        }
        }
        else{
            return redirect(route('login'));
        }

        return redirect()->route('front.page')->with('error',"You don't have admin access.");
    }
}
