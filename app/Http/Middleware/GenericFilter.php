<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class GenericFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url=$request->url();
       /* 

      if(!(Session::has('codigoUsario'))&& $url!='http://localhost:90/appwebtiendavirtual/public' && !($request->has('InputUsername')))
        {
            return redirect('/');
        }
*/
        $response = $next($request);

        //after request

        return $response;
    }
}