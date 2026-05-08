<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class AuditoriaMiddleware
{
    public function handle($request, Closure $next)
    {
        // Compartir datos de auditoría con todas las vistas
        View::share('current_user', [
            'nombre' => auth()->user()->nombre ?? null,
            'email' => auth()->user()->email ?? null,
            'id' => auth()->user()->id ?? null,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return $next($request);
    }
}
