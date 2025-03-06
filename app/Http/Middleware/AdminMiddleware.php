<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifică dacă utilizatorul este autentificat
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Trebuie să fii autentificat!');
        }

        // Verifică dacă utilizatorul este admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Nu ai permisiuni de admin!');
        }

        return $next($request);
    }
}
