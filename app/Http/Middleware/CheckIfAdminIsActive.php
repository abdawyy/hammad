<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfAdminIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth('admin')->check() && !auth('admin')->user()->is_active) {
            auth('admin')->logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Your account is not activated yet.',
            ]);
        }

        return $next($request);
    }

}
