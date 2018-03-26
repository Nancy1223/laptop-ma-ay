<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class MDcajero
{
    public function handle($request, Closure $next)
    {
      if( Session::has('codigoUsuario'))
        {
          $response = $next($request);
          return $response;   
        }

        return redirect('/');
    }
}
