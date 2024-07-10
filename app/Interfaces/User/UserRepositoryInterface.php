<?php

namespace App\Interfaces\User;

use App\Http\Resources\UserResource;
use App\Models\User;

interface UserRepositoryInterface {
    public function getAll();
    public function getById(int $id);

    public function getByEmail(string $email);

    public function create(array $data);

    public function update(User $user, array $data);

    public function delete(User $user);
}
