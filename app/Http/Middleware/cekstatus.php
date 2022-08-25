<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekstatus
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
        if (Auth::user()->verify == 'Belum Aktif') {
            Auth::logout();
            return redirect()->back()->with(
                'sukses',
                'Akun Belum Terdaftar, Silahkan hubungi administrator untuk aktivasi akun anda agar bisa masuk'
            );
        }

        return $next($request);
    }
}
