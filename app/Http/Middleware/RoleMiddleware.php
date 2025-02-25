<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoleMiddleware
 *
 * Middleware to restrict access to routes based on the authenticated user's role.
 *
 * @package App\Http\Middleware
 */
class RoleMiddleware
{
    /**
     * Handles the incoming request and checks if the user has the required role.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request.
     * @param  \Closure  $next The next action in the middleware chain.
     * @param  string  $role The required role to access the route.
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Checks if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login'); // Redirects to the login page if not authenticated
        }

        // Checks if the user has the required role
        if (!Auth::user()->hasRole($role)) {
            abort(403, 'No tienes permiso para acceder a esta página.'); // Returns a 403 error if the role is not met
        }

        return $next($request); // Proceeds with the request execution
    }
}
