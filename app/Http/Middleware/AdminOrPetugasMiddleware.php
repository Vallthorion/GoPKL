<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrPetugasMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        // Jika tidak login, redirect ke login
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Jika role adalah admin atau petugas, lanjut
        if (in_array($user->role, ['admin', 'petugas'])) {
            return $next($request);
        }
        
        // Jika siswa, redirect ke dashboard siswa
        if ($user->role === 'siswa') {
            return redirect()->route('siswa.dashboard');
        }
        
        // Default redirect
        return redirect()->route('login');
    }
}
