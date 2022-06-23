<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session()->get('locale');
        if (empty($locale)) {
            $locale = $request->cookie('locale');
        }
        if (!in_array($locale, config('app.locales'))) {
            $locale = config('app.fallback_locale');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
