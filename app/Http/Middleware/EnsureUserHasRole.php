<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $user = auth()->user();

        if(!$user) {
            abort(403, 'Tidak ada user');
        }

        if (!$user || $user->roles->isEmpty()) {
            abort(403, 'Akun anda belum terverifikasi oleh admin.');
        }

        if ($user->hasRole('siswa') && !$user->siswa) {
            abort(403, 'Profil siswa belum didaftarkan.');
        }

        if ($user->hasRole('guru') && !$user->guru) {
            abort(403, 'Profil guru belum didaftarkan.');
        }

        return $next($request);
    }
}
