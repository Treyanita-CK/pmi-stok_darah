<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
            if (! $request->expectsJson()) {
                return route('login');
            if ($user && $user->role_id == 2) {
                return route('user.login');
            } else {
                return route('login');
            }
        }
    }
}
