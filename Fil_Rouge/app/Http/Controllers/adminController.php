<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
class adminController extends Controller
{
    //

    public function login(Request $request){
        $admin = Admin::where('email',$request->email)->first();
        if(!$admin || !Hash::check($request->password,$admin->password)){
            return response([
                'massage' => 'wrong mdp'
            ],401);
        }else{
            return $admin->token;
        }
    }
}
