<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Interfaces\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService) {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
       $user = $this->userService->createUser($request->validated());
       return response()->json([
        'status' => true,
        'message' => 'created successfully',
        'data' => $user
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $this->userService->updateUser($user,$request->validated());
       return response()->json([
        'status' => true,
        'message' => 'updated successfully',
        'data' => $user
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $is_deleted = $this->userService->deleteUser($user);
        return response()->json([
            'status' => true,
            'message' => ($is_deleted) ? 'deleted successfully' : 'Error occur..',
            'data' => []
           ]);
    }
}
