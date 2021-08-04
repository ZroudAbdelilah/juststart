<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ProjectLeader;

class ProjectLeaderMiddleware
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
        // dd($request);
        $projectLeader = ProjectLeader::find( $request->header('id'));
        $token = $request->header('token');
        if($projectLeader && $projectLeader->token === $token){
            return $next($request);
        }else{
            return response([
                'massage' => 'Token in valid!'
            ],401);
        }
    }
}
