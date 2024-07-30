<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Console
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard');
            }
        } else {
            return redirect('/logout');
        }
    }
}
