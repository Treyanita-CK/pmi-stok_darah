<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            if (Auth::user()->role_id === 1) {

                return $next($request);
            }
        }

        return redirect('/auth/login')->with('Error', 'You must login for access');
    } 
}
