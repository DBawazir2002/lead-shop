<?php

namespace App\Interfaces\User;

use App\Models\User;

interface UserServiceInterface
{
    public function getAllUsers();

    public function getUserById(int $id);

    public function getUserByEmail(string $email);

    public function createUser(array $data);

    public function updateUser(User $user, array $data);

    public function deleteUser(User $user);

    public function addUserAddress(User $user, array $data);

    public function deleteUserAddress(User $user);

    public function updateUserAddress(User $user, array $data);

    public function convertToResource(User $user);

}
