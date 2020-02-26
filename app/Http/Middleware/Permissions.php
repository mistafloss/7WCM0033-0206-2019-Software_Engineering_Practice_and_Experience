<?php

namespace App\Http\Middleware;

use Closure;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if(!$request->user()->hasPermissionTo($permission))
        {
            return abort(404, "Access denied for this resource!");
        }
        return $next($request);
    }
}
