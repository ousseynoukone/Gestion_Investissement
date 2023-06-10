<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {    
       if($request['user'])
       {
        if($request['user']!=$roles[0])
        {
            return abort(404,"Acces non autorisé");

        }
       }
        return $next($request);
    }
}
