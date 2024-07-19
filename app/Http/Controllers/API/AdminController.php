<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Interfaces\Admin\AdminServiceInterface;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminServiceInterface $adminService){
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = $this->adminService->getAllAdmins();
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $admins
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = $this->adminService->convertToResource($this->adminService->createAdmin($request->validated()));
       return response()->json([
        'status' => true,
        'message' => 'created successfully',
        'data' => $admin
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin){
        $admin = $this->adminService->convertToResource($this->adminService->getAdminById($admin->id));
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $admin
        ]);
    }

    public function showProfile(){
        $admin = $this->adminService->convertToResource($this->adminService->getAdminById(auth()->user()->id));
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $admin
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin = $this->adminService->convertToResource($this->adminService->updateAdmin($admin,$request->validated()));
       return response()->json([
        'status' => true,
        'message' => 'updated successfully',
        'data' => $admin
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $is_deleted = $this->adminService->deleteUser($admin);
        return response()->json([
            'status' => true,
            'message' => ($is_deleted) ? 'deleted successfully' : 'Error occur..',
            'data' => []
           ]);
    }

    public function assignRole(Admin $admin, string $role){
        $this->adminService->assignRole($admin,$role);
        return response()->json([
            'status' => true,
            'message' => 'Role Assigned successfully',
            'data' => []
           ]);
    }

    public function removeRole(Admin $admin, string $role){
        $this->adminService->removeRole($admin,$role);
        return response()->json([
            'status' => true,
            'message' => 'Role Removed successfully',
            'data' => []
           ]);
    }
}
