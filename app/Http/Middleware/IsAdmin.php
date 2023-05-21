<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $nipDefault = '10190087';
        // $passwordDefault = 'adminreovelnt';
        // $id_golonganDefault = '1';
        if (auth()->user()->id_golongan == 1) {
            return $next($request);
        } else if (auth()->user()->id_golongan == 2) {
            return redirect('resepsionist/home')->with('error', "You don't have admin access.");
        } else if (auth()->user()->id_golongan == 3) {
            return redirect('dokter/home')->with('error', "You don't have admin access.");
        } else if (auth()->user()->id_golongan == 4) {
            return redirect('kasir/home')->with('error', "You don't have admin access.");
        } else {
            return redirect('/');
        }
    }
}
