<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Str;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields = $request->validate([
            'username'=> 'required|string',
            'email'=>'required|string|unique:users,email',
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
            $user = User::create([
                'username'=>$fields['username'],
                'email'=>$fields['email'],
                'password'=>Hash::make($fields['password']),
                'adresss_id' => $adressId->id,
                'token'=> Str::random(60)
            ]);
        }
        
        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response =[
            'user'=>$user,
            'token'=>$user->token
        ];

        return response($response,201);
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
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
        $user = User::where('email',$fields['email'])->first();
        //check password
        if(!$user|| !Hash::check($fields['password'],$user->password)){
            return response([
                'massage' => 'wrong mdp'
            ],401);
        }
        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response =[
            'user'=>$user,
            'token'=>$user->token
        ];

        return response($response,201);
    }
}
