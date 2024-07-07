<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = $admin = null;
        $request->validate([
            'email' => 'required|email',
            'password'  => 'required|string'
        ]);


        if ($user = User::where('email',$request->email)->first()) {
                if ($user && Hash::check($request->password, $user->password)) {
                    $token = $user->createToken('API Token For User')->plainTextToken;
                }
        }

        if ($admin = Admin::where('email',$request->email)->first()) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                $token = $admin->createToken('API Token For Admin')->plainTextToken;
            }
        }

        return response()->json([
            'status' => (isset($admin) or isset($user)) ? true : false,
            'message' => (isset($admin) or isset($user)) ? 'Logged successfully' : 'Incorrect email or password, please try again.',
            'token' => (isset($admin) or isset($user)) ? $token : null,
            'data' => (isset($admin) or isset($user)) ? (isset($admin) ? $admin->toArray() : $user->toArray()) : []
        ]);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = null;
        $request->validated();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone
            ]);
            $token = $user->createToken('API Token For User')->plainTextToken;
            $user->sendEmailVerificationNotification();
        return response()->json([
            'status' => (isset($user)) ? true : false,
            'message' => (isset($user)) ? 'User created successfully' : 'Error occur, please try again.',
            'token' => (isset($user)) ? $token : null,
            'data' => (isset($user)) ? $user->toArray() : []
        ]);
    }
}
