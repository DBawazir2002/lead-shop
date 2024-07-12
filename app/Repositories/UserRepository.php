<?php

namespace App\Repositories;

use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(){
        return User::get();
    }

    public function getById($id){
        return User::findOrFail($id);
    }

    public function getByEmail(string $email){
        return User::where('email', $email)->first();
    }

    public function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'phone'=> $data['phone'],
        ]);

        return $user;
    }

    public function update(User $user, array $data){
        $user->update($data);
        return $user;
    }

    public function delete(User $user){
        return $user->delete();
    }
}
