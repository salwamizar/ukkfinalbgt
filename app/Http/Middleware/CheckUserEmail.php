<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            $userEmail = $user->email;
            $exists = false;

            if($user->hasRole('siswa')) {
                $exists = Siswa::where('email', $userEmail)->exists();
            }

            if($user->hasRole('guru')) {
                $exists = Guru::where('email', $userEmail)->exists();
            }

            if (!$exists) {
                Auth::logout();
                abort(403, 'Anda bukan user Pkl');
            }

        }
        return $next($request);
    }
}
