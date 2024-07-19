<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Interfaces\Auth\AuthServiceInterface;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthServiceInterface $authService){
        $this->authService = $authService;
    }
    public function login(LoginRequest $request)
    {
        $data = $this->authService->login($request->validated());
        return response()->json([
            'status' => $data['status'],
            'message' => $data['message'],
            'token' => $data['token'],
        ]);
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $this->authService->register($request->validated());
        return response()->json([
            'status' => $data['status'],
            'message' => $data['message'],
            'token' => $data['token'],
            'data' => $data['user'],
        ]);
    }
}
