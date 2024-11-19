<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectToDashboard
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->isProfesor()) {
                return redirect()->route('profesor.dashboard');
            } elseif ($user->isAlumno()) {
                return redirect()->route('alumno.dashboard');
            } else {
                return redirect()->route('default.dashboard');
            }
        }

        return $next($request);
    }
}
