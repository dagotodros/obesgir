<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards): mixed
    {
        $header = $request->header('Authorization');
        $header = str_replace('Bearer ', '', $header);
        if (config('token.api_token') == $header ){
            return $next($request);
        }

        throw new AuthenticationException('Auth by token is failed');
    }
}
