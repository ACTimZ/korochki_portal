<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user_id') || !$request->session()->get('is_admin')) {
            abort(403, 'Доступ запрещён');
        }

        return $next($request);
    }
}
