<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ApiAuthentication
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
        $token = $request->header('api_token');
        $users = User::where('api_token', $token)->get();
        if (!$users) {
            return response()->json(['message' => 'Api Token Failed'], 401);
        } else {
            return $next($request);
        }
        // return 1;
    }
}
