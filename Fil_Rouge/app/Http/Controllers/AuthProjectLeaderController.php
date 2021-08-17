<?php

namespace App\Http\Controllers;
use App\Models\ProjectLeader;
use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
class AuthProjectLeaderController extends Controller
{
    //
    public function register(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'username'=> 'required|string',
            'email'=>'required|email|string|unique:project_leader',
            'password'=>'required|string|confirmed',
            'county' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'p_code' => 'required|string'
        ]);
        if($validator->fails()){
            return [
                'state' => 500,
                'error' => $validator->errors()
            ];
        }

        $adressId = Adress::create([
            'county' => $request->input('county'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'p_code' => $request->input('p_code')
        ]);
        if($adressId){
            $projectLeader = ProjectLeader::create([
                'username'=>$request->input('username'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
                'adresss_id' => $adressId->id,
                'token' => Str::random(60)
            ]);
        }
        

        $response = [
            'state' => 200,
            'user'=>$projectLeader,
            'token'=>$projectLeader->token
        ];

        return response($response,200);
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
            'user'=>$projectLeader,
            'token'=>$projectLeader->token
        ];

        return response($response,201);
    }
}
