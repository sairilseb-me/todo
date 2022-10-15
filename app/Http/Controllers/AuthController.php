<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'status' => 'failed',
                'message' => 'Incorrect credentials.'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('mytoken')->plainTextToken;

       

        return response()->json([
            'status'=> 'success',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function checkAuthUser(){
        if(!Auth::user()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Page expired. You have to login.'
            ], 419);
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        
        return response()->json([
            'status'=> 'success',
            'message' => 'Successfully logged out'
        ]);
    }
}
