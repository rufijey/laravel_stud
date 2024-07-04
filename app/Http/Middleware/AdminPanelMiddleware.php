<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route = $request->route();
        if ($route && $route->getName()) {
            Log::info('AdminPanelMiddleware triggered for route: ' . $route->getName());
        } else {
            Log::info('AdminPanelMiddleware triggered for a route with no name.');
        }
        if (!Auth::check() || auth()->user()->role !== 'admin') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
