<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
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
        return UserResource::collection(User::get());
    }

    public function getById($id){
        return new UserResource(User::findOrFail($id));
    }

    public function getByEmail(string $email){
        return new UserResource(User::where('email', $email)->first());
    }

    public function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'phone'=> $data['phone'],
        ]);

        return new UserResource($user);
    }

    public function update(User $user, array $data){
        $user->update($data);
        return new UserResource($user);
    }

    public function delete(User $user){
        return $user->delete();
    }
}
