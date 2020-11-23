<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Str;

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
            $contains = Str::contains(url()->current(), ['forgot-password', 'login', 'logout', 'register', 'reset-password', 'user/confirm-password', 'user/password', ]);
            if ($contains) {
                return route('login');
            } else {
                return route('login', ['urlback' => url()->current()]);
            }
        }
    }
}
