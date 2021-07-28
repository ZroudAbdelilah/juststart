<?php

namespace App\Http\Controllers;
use App\Models\ProjectLeader;
use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Str;
class AuthProjectLeaderController extends Controller
{
    //
    public function register(Request $request){
        $fields = $request->validate([
            'username'=> 'required|string',
            'email'=>'required|string|unique:project_leader,email',
            'password'=>'required|string|confirmed',
            'county' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'p_code' => 'required|string'
        ]);

        $adressId = Adress::create([
            'county' => $fields['county'],
            'state' => $fields['state'],
            'city' => $fields['city'],
            'street' => $fields['street'],
            'p_code' => $fields['p_code']
        ]);
        if($adressId){
            $projectLeader = ProjectLeader::create([
                'username'=>$fields['username'],
                'email'=>$fields['email'],
                'password'=>Hash::make($fields['password']),
                'adresss_id' => $adressId->id,
                'token' => Str::random(60)
            ]);
        }
        

        $response =[
            'projectLeader'=>$projectLeader,
            'token'=>$projectLeader->token
        ];

        return response($response,201);
    }
    public function logout(Request $request){
        auth()->projectLeader()->tokens()->delete();
        return[
            'message' => 'logged out'
        ];
    }
    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);
        
        //Check email
        $projectLeader = ProjectLeader::where('email',$fields['email'])->first();
        //check password
        if(!$projectLeader|| !Hash::check($fields['password'],$projectLeader->password)){
            return response([
                'massage' => 'wrong mdp'
            ],401);
        }
        // $token = Hash::make(Str::random(60));
        // return ['token'=>$projectLeader->token];

        $response =[
            'projectLeader'=>$projectLeader,
            'token'=>$projectLeader->token
        ];

        return response($response,201);
    }
}
