<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isArtist
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role_id !== 2) {
            return response()->json([
                "status" => 403,
                "message" => "Вы не являетесь исполнителем!"
            ], 403);
        }

        return $next($request);
    }
}
