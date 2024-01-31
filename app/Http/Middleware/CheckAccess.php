<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $access)
    {
        $parts = explode(':', $access);
        $checkType = $parts[0]; // 'role' or 'permission'
        $checkValue = $parts[1]; // Role name or permission name

        if ($checkType === 'role') {
            if (!Auth::user()->hasRole($checkValue)) {
                abort(403, 'Unauthorized action.');
            }
        } elseif ($checkType === 'permission') {
            if (!Auth::user()->hasPermission($checkValue)) {
                abort(403, 'Unauthorized action.');
            }
        } else {
            abort(500, 'Invalid access check type.');
        }

        return $next($request);
    }
}
