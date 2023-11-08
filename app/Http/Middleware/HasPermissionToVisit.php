<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class HasPermissionToVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sidemenu = collect(config('sidemenu'));
        $menu = $sidemenu->where('url', '/'.$request->path())->first();
        if (isset($menu['permission']) && !Auth::user()->hasPermissionTo($menu['permission'])){
            return \response('You are not allowed to visit this page.');
        }
        return $next($request);
    }
}
