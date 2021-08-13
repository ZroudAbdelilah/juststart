<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

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
        $admin = admin::find(1);
        $token = $request->header('token');
        if($admin && $admin->token === $token){
            return $next($request);
        }else{
            return response([
                'massage' => 'Admin Token in valid!',
            ],401);
        }
    }
}
