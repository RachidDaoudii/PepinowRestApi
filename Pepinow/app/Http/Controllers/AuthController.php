<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestRegister;

class AuthController extends Controller
{
    public function login(RequestLogin $request){

        $login = $request->only('email', 'password');

        $token = Auth::attempt($login);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(RequestRegister $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout(){
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function infoProfile(){
        $user = DB::table('users')->select('name','email')->find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'user' =>$user
        ],201);
    }

    public function editProfile(Request $request){
        $passwordUser = Auth::user()->password;
        if(Hash::check($request->old_password,$passwordUser)){
            $user = DB::table('users')->where('id',Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User updated successfully'
            ]);

        }
        else{

            return response()->json([
                'status' => 'error',
                'message' => 'error password',
            ], 401);

        }
        
    }
}
