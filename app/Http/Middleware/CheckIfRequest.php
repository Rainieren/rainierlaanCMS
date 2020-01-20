<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfRequest
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
        if (auth()->check() && !auth()->user()->is_request == 0)
        {
            auth()->logout();

            $note = __('Your account has not yet been accepted by our admins, Please come back later.');

            return redirect('/login')->with($note);
        }
        return $next($request);
    }
}
