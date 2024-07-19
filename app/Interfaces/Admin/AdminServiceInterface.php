<?php

namespace App\Interfaces\Admin;

use App\Models\Admin;

interface AdminServiceInterface
{
    public function getAllAdmins();

    public function getAdminById(int $id);

    public function getAdminByEmail(string $email);

    public function createAdmin(array $data);

    public function updateAdmin(Admin $admin, array $data);

    public function deleteAdmin(Admin $admin);

    public function convertToResource(Admin $admin);

    public function assignRole(Admin $admin, string $role);
    public function removeRole(Admin $admin, string $role);

}
