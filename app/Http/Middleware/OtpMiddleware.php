<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\OtpMiddleware as Middleware;

public function handle($request, Closure $next, $guard = null)
{
    if (!$request->user()->isActiveOtp()) {
        return redirect('otp');
    }

    return $next($request);
}