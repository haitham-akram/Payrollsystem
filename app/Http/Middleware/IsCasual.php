<?php

namespace App\Http\Middleware;

use Closure;
use App\models\Employee;

class IsCasual
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
        if (auth()->user()->employee_id != 0) {
            $employee =   Employee::where('id', auth()->user()->employee_id)->first();
            if ($employee->type == 'Casual') {
                return $next($request);
            }
        }
        return redirect()->back()->with('error', "You don't have Casual Academic access.");
        // ->route('logout')->with('error', "You don't have Casual Academic access.")
    }
}
