<?php

namespace App\Interfaces\Admin;

use App\Models\Admin;

interface AdminRepositoryInterface
{
    public function getAll($admin_id);
    public function getById(int $id);

    public function getByEmail(string $email);

    public function create(array $data);

    public function update(Admin $admin, array $data);

    public function delete(Admin $admin);
}
