<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::find( $request->header('id'));
        $token = $request->header('token');
        if($user && $user->token === $token){
            return $next($request);
        }else{
            return response([
                'massage' => 'Token in valid!'
            ],401);
        }
    }
}
