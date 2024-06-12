<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user login and release token
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();

        if(isset($user)){
            if(Hash::check($request->password,$user->password)){
                return response()->json([
                    'user'=>$user,
                    'token'=>$user->createToken(time())->plainTextToken
                ]);
            }

        }
        else{
            return response()->json([
                'user'=>null,
                'token'=>null,
            ]);
        }
    }

    //category list
    public function categoryList(){
        return response()->json([
            'message'=>'true'
        ]);
    }
}
