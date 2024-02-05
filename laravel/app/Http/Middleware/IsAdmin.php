<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /* Comprobamos si el usuario es Admin para poder acceder a la ruta solicitada */
        if (auth()->user()->is_admin==1) {
            return $next($request); /* Si es admin, podrá acceder a cualquier ruta */
        } else {
            /* Si NO es Admin (es un cliente con cuenta de Usuario Normal) lo redirigimos a su home notificándole que no tiene permisos */
            return redirect('home')->with('error', 'No tienes permisos de Administrador.');
        }
    }
}
