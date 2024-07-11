<?php

namespace App\Services;

use App\Interfaces\User\UserRepositoryInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    private $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(){
        return $this->userRepository->getAll();
    }

    public function getUserById($id){
        return $this->userRepository->getById($id);
    }

    public function getUserByEmail(string $email){
        return $this->userRepository->getByEmail($email);
    }

    public function createUser(array $data){
        return $this->userRepository->create($data);
    }

    public function updateUser(User $user,array $data){
        return $this->userRepository->update($user,$data);
    }

    public function deleteUser(User $user){
        $is_deleted = false;
        if(auth()->user()->hasPermissionTo('delete users')){
             $is_deleted = $this->userRepository->delete($user);
        }
        return $is_deleted;
    }
}
