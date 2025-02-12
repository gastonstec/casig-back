<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoleMiddleware
 *
 * Middleware para restringir el acceso a rutas según el rol del usuario autenticado.
 *
 * @package App\Http\Middleware
 */
class RoleMiddleware
{
    /**
     * Maneja la solicitud entrante y verifica si el usuario tiene el rol requerido.
     *
     * @param  \Illuminate\Http\Request  $request La solicitud HTTP.
     * @param  \Closure  $next La siguiente acción en la cadena de middleware.
     * @param  string  $role El rol requerido para acceder a la ruta.
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login'); // Redirige a la página de login si no está autenticado
        }

        // Verifica si el usuario tiene el rol requerido
        if (!Auth::user()->hasRole($role)) {
            abort(403, 'No tienes permiso para acceder a esta página.'); // Retorna error 403 si no tiene el rol
        }

        return $next($request); // Continúa con la ejecución de la solicitud
    }
}
