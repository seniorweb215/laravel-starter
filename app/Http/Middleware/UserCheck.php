<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type = null)
    {
        $user_type = Auth::user()->user_type;

        if ($user_type == 1 && $type == 'teacher')
        {
            return $next($request);
        }
        else if ($user_type == 2 && $type == 'student')
        {
            return $next($request);
        }

        abort(403);
    }
}
