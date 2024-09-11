<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class VerifySigned
{
    public function handle(Request $request, Closure $next)
    {
        // Mengecek apakah tanda tangan URL valid
        if (!URL::hasValidSignature($request)) {
            abort(403, 'Invalid or expired signature.');
        }

        return $next($request);
    }
}
