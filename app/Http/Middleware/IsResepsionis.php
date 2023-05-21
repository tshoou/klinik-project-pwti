<?php

namespace App\Http\Middleware;

use Closure;

class IsResepsionis
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
        if (auth()->user()->id_golongan == 2) {
            return $next($request);
        } else if (auth()->user()->id_golongan == 1) {
            return redirect('admin/home')->with('error', "You don't have admin access.");
        } else if (auth()->user()->id_golongan == 3) {
            return redirect('dokter/home')->with('error', "You don't have admin access.");
        } else if (auth()->user()->id_golongan == 4) {
            return redirect('kasir/home')->with('error', "You don't have admin access.");
        } else {
            return redirect('/');
        }
    }
}
