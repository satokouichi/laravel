<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = env('BASIC_AUTH_USER');
        $pass = env('BASIC_AUTH_PASSWORD');

        if ($request->getUser() != $user || $request->getPassword() != $pass) {
            $headers = ['WWW-Authenticate' => 'Basic'];
            return response('Unauthorized.', 401, $headers);
        }

        return $next($request);
    }
}
