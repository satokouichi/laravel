<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = config('app.basic_auth_user');
        $pass = config('app.basic_auth_password');

        if ($request->getUser() != $user || $request->getPassword() != $pass) {
            $headers = ['WWW-Authenticate' => 'Basic'];
            return response('Unauthorized.', 401, $headers);
        }

        return $next($request);
    }
}
