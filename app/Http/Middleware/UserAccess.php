<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $userType): Response
    public function handle(Request $request, Closure $next, $userRole): Response
    {
        // if(auth()->user()->type == $userType){
        if(auth()->user()->type == $userRole){
            return $next($request);
        }
        return response()->json(['You are not authorized to access this resource']);
         
    }
}
