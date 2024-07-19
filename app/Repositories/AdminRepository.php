<?php

namespace App\Repositories;
use App\Interfaces\Admin\AdminRepositoryInterface;
use App\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll($admin_id){
        return Admin::where('id','!=',$admin_id)->get();
    }
    public function getById(int $id){
        return Admin::findOrFail($id);
    }

    public function getByEmail(string $email){
        return Admin::where("email", $email)->first();
    }

    public function create(array $data){
        return Admin::create($data);
    }

    public function update(Admin $admin, array $data){
        return $admin->update($data);
    }

    public function delete(Admin $admin){
        return $admin->delete();
    }
}
