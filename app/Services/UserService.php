<?php

namespace App\Services;

use App\Interfaces\Address\AddressRepositoryInterface;
use App\Interfaces\Address\AddressServiceInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    private $userRepository, $addressService;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepositoryInterface $userRepository, AddressServiceInterface $addressService)
    {
        $this->userRepository = $userRepository;
        $this->addressService = $addressService;
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

    public function addUserAddress(User $user, array $data){
       // $user->address()->save($data);
       if($user->address_id == null){
        $data['user_id'] = $user->id;
        $address =  $this->addressService->createAddress($data);
        $data['address_id'] = $address->id;
       }
       return $this->updateUser($user, $data);
    }

    public function updateUserAddress(User $user, array $data){
        // $user->address()->save($data);
        $data['user_id'] = $user->id;
        return $this->addressService->updateAddress($this->addressService->getAddress($user->address_id),$data);
     }

     public function deleteUserAddress(User $user){
        $this->addressService->deleteAddress($this->addressService->getAddress($user->address_id));
        $data['address_id'] = null;
        return $this->updateUser($user, $data);

     }
}
