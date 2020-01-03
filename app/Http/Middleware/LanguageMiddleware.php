<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
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
        if (auth()->check()) {
            $language = Auth::user()->language;

            if (empty($language)) {
                $language = config('app.fallback_locale');
            }

            app()->setLocale($language);
            Session::put('applocale', $language);
            Auth::user()->language = $language;
            Auth::user()->save();

            return $next($request);
        }

        if (Session::has('applocale')) {
            app()->setLocale(Session::get('applocale'));
        } else {
            app()->setLocale(config('app.fallback_locale'));
            Session::put('applocale', config('app.fallback_locale'));
        }
        return $next($request);
    }
}
