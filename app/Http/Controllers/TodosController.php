<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function index(){
        return Todo::all();
    }

    public function create(Request $request){

        $request->validate([
            'title' => 'required|string'
        ]);

        $user = Auth::user();

        $todo = Todo::create([
            'title' => $request->title,
            'user_id' => $user->id,
        ]);

        if(!$todo) return response()->json([
            'status' => 'failed',
            'message' => 'Failed to add Todo Task.'
        ]);

        return response()->json([
            'status'=> 'success',
            'message' => 'Successfully added a Todo Task.'
        ]);
    }

    public function logout(){
        Auth::logout();
        
        return response()->json([
            'status'=> 'success',
            'message' => 'Successfully logged out'
        ]);
    }
}
