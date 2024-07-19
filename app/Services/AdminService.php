<?php

namespace App\Services;

use App\Interfaces\Admin\AdminRepositoryInterface;
use App\Interfaces\Admin\AdminServiceInterface;
use App\Models\Admin;
use App\Http\Resources\AdminResource;

class AdminService implements AdminServiceInterface
{
    private $adminRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAllAdmins(){
        if(auth()->user()->hasRole('super-admin')){
            return AdminResource::collection($this->adminRepository->getAll(auth()->user()->id));
        }
    }

    public function getAdminById(int $id){
        if(auth()->user()->hasRole('super-admin') or ( auth()->check() and auth()->user()->id == $id)) {
            return $this->adminRepository->getById($id);
        }
    }

    public function getAdminByEmail(string $email){
        return $this->adminRepository->getByEmail($email);
    }

    public function assignRole(Admin $admin, string $role){
        if(auth()->user()->hasPermissionTo('assign role')){
            $admin->assignRole($role);
       }
    }

    public function removeRole(Admin $admin, string $role){
        if(auth()->user()->hasPermissionTo('remove role')){
            $admin->removeRole($role);
       }
    }

    public function createAdmin(array $data){
        if(auth()->user()->hasPermissionTo('create admins')){
            $admin = $this->adminRepository->create($data);
       }
       $this->assignRole($admin,$data['level']);
       return $admin;
    }

    public function convertToResource(Admin $admin){
        return new AdminResource($admin);
    }


    public function updateAdmin(Admin $admin, array $data){
        if(auth()->user()->hasPermissionTo('edit admins')){
            $admin = $this->adminRepository->update($admin, $data);
       }
       return $admin;
    }

    public function deleteAdmin(Admin $admin){
        $is_deleted = false;
        if(auth()->user()->hasPermissionTo('delete admins')){
             $is_deleted = $this->adminRepository->delete($admin);
        }
        return $is_deleted;
    }
}
