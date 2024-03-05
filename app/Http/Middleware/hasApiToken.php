<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use function response;

class hasApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('sanctum')->check()) {
            $request->setUserResolver(function () {
                return Auth::guard('sanctum')->user();
            });

            return $next($request);
        }

        return response()->json(['error' => 'Unauthenticated'], 401);
    }
}
