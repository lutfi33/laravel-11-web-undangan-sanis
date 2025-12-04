<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!$request->user()) {
        return redirect()->route('login')->with('alert', 'Silakan login terlebih dahulu.');
    }

    if ($request->user()->role !== $role) {
        abort(403, 'Anda tidak memiliki izin.');
    }

        return $next($request);
    }
}
