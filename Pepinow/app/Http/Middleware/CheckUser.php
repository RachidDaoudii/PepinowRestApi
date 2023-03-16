<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role == UserType::User){
            return $next($request);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Your are not authorized',
            ],404);
        }
    }
}