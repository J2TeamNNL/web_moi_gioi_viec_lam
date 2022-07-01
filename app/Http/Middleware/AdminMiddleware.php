<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || user()->role !== UserRoleEnum::ADMIN) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
