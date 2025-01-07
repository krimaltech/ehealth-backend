<?php

namespace App\Http\Middleware;

use App\Helper\Helper;
use Closure;
use Illuminate\Http\Request;

class AtLeastTwoRoles
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
        if (Helper::switch_role() === 2) {
            return view('viewnotfound');
       }
       return $next($request);
    }
}
