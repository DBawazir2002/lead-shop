<?php

namespace App\Services;

use App\Interfaces\Auth\AuthServiceInterface;
use App\Interfaces\User\UserServiceInterface;

class AuthService implements AuthServiceInterface
{
    private $userService;
    /**
     * Create a new class instance.
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function register(array $data){
        $user = null;
        $user = $this->userService->createUser($data);
        $user->sendEmailVerificationNotification();
        return $user;
    }

    public function login(array $data){

    }

    public function logout(){}

    public function generateAuthToken(object $obj){
        return $obj->createToken('API Token')->plainTextToken;
    }
}
