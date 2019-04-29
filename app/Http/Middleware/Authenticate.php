<?php

namespace App\Http\Middleware;

use http\Env\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $reque st
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return response()->json(['error' => 'unauthenticated'],401);
        }
    }
}
