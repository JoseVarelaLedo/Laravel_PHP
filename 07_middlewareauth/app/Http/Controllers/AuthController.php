<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;

use App\Models\User;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status'=>true,
            'message'=>'User created successfully',
            'token' =>$user->createToken("API TOKEN")->plainTextToken,
        ], 200);
    }

    public function loginUser(LoginRequest $request)
    {
        //la clase Auth nos aporta los métodos para login y acceso a datos
        if (!Auth::attempt($request->only(['email', 'password'])))
            {
                return response()->json([
                    'status'=> false,
                    'message' => 'Email || password do not match with our records'
                ], 401);
            }
        $user = User::where ('email', $request->email)->first();
        return response()->json([
            'status'=> true,
            'message' => 'User logged successfully',
            'token' =>$user->createToken("API TOKEN")->plainTextToken,
        ], 200);
    }
}
