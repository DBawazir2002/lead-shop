<?php

namespace App\Services;

use App\Interfaces\Admin\AdminServiceInterface;
use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\User\UserServiceInterface;

class AuthService implements AuthServiceInterface
{
    private $userService, $adminService;
    /**
     * Create a new class instance.
     */
    public function __construct(UserServiceInterface $userService, AdminServiceInterface $adminService)
    {
        $this->userService = $userService;
        $this->adminService = $adminService;
    }

    public function register(array $data){
        $token = $user = null;
        $status = false;
        $msg = 'Error occur, please try again.';
        if($user = $this->userService->createUser($data)){
            $user->sendEmailVerificationNotification();
            $token =$this->generateAuthToken($user);
            $msg = 'User registered successfully';
            $status = true;
        }

        return [
            'user' => $this->userService->convertToResource($user),
            'token' => $token,
            'status' => $status,
            'message'=> $msg
        ];
    }

    public function login(array $data){
        $token = null;
        $status = true;
        $msg = 'Logged successfully';
        if($user = $this->userService->getUserByEmail($data['email'])){
            $token =$this->generateAuthToken($user);
        }elseif($admin = $this->adminService->getAdminByEmail($data['email'])){
            $token = $this->generateAuthToken($admin);
        }else{
            $msg = 'Incorrect email or password, please try again.';
            $status = false;
        }
        return[
            'status' => $status,
            'message' => $msg,
            'token' => $token
        ];
    }

    public function logout(){}

    public function generateAuthToken(object $obj){
        return $obj->createToken('API Token')->plainTextToken;
    }
}
