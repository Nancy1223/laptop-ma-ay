<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class MDadmin
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
      if( Session::has('codigoUsuario') && Session::get('codigoUsuario')->tipoUsuario=='Administrador' )
        {
            $response = $next($request);
            return $response;
            
        }

        return redirect('/');

      
    }
}