<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
       if (Auth::check()) {

            if(Auth::user()->role_id === 2) {
                
                return $next($request);
            }
        }

        return redirect('user.login')->with('Error','You must login for donor');
    } 
}