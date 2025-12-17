<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/home'); // Перенаправляємо на домашню сторінку, якщо користувач не адміністратор
        }

        return $next($request);
    }
}
