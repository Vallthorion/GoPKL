<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Jika belum login, redirect ke login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Jika role user tidak match, redirect ke dashboard yang sesuai
        if (auth()->user()->role !== $role) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role === 'siswa') {
                return redirect()->route('siswa.dashboard');
            } elseif (auth()->user()->role === 'guru') {
                return redirect()->route('guru.dashboard');
            }
            abort(403);
        }

        return $next($request);
    }
}

