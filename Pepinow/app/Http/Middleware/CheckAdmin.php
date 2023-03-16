<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role == UserType::Admin || Auth::user()->role == UserType::Vendeur){
            return $next($request);
        }else{
            // return abort(404);
            return response()->json([
                'status' => true,
                'message' => 'Your are not authorized',
            ],404);
        }
    }
}
