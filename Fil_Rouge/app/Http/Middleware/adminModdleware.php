<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;

class adminModdleware
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
        // dd($request->header('token'));
        $admin = Admin::find(1);
        $token = $request->header('token');
        if($admin && $admin->token === $token){
            return $next($request);
        }else{
            return response([
                'massage' => 'Token in valid!'
            ],401);
        }
    }
}
