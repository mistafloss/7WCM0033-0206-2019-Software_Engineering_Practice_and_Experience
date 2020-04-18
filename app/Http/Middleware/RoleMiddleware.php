<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        if(!Auth::check())
        {
            return abort(401, "Access denied for this resource!");
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
       
        if(!$request->user()->hasAnyRole($roles)){
            
            return abort(404, "Access denied for this resource!");
        }
        return $next($request);
    }
}
