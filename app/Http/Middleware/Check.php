<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $routename = $request->route()->getName();

        if (Auth::check()) {
            if (Permission::where('key', $routename)->first()) {
                $role = Auth::user()->roles->first();
                if ($role->permissions()->where('key', $routename)->exists()) {
                    return $next($request);
                } else {
                    abort(403);
                }
            } else {
                abort(404);
            }
        } else {
            return redirect()->route('loginPage');
        }
    }
}
