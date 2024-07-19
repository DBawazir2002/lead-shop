<?php

namespace App\Interfaces\Auth;

use App\Models\Admin;

interface AuthServiceInterface
{
    public function register(array $data);

    public function login(array $data);

    public function logout();

    public function generateAuthToken(object $obj);
}
