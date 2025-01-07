<?php

namespace App\Http\Middleware;

use App\Models\SessionTokens;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidateSessionToken
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
        $token = SessionTokens::where('user_id', Auth::id())->latest()->first()->token;
        if ($request->session()->get('token') != $token) {
            return redirect('/logout');
        }

        return $next($request);
    }
}
