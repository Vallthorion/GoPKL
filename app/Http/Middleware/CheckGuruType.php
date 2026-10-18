<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Guru;

class CheckGuruType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $type
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if ($request->user()) {
            $guru = Guru::where('user_id', $request->user()->id)->first();
            
            if ($guru && $guru->type === $type) {
                return $next($request);
            }
        }
        
        abort(403, 'Unauthorized access');
    }
}

