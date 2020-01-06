<?php

namespace App\Http\Middleware;

use Closure;

class RoleAllowedMiddleware
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
        $allowed_ids =[1,2];

        if(!in_array($request->user()->role_id, $allowed_ids)) {
            return redirect('/');
        }
        return $next($request);
    }
}
