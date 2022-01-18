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
        if (auth()->user()->employee_id == 0) {
            return $next($request);
        }
        // return redirect()->route('logout')->with('error', "You don't have admin access.");
        return redirect()->back()->with('error', "You don't have admin access.");
    }
}
