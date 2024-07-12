<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
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

    public function show(User $user){
        $user = $this->userService->convertToResource($this->userService->getUserById($user->id));
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $user
        ]);
    }

    public function showProfile(){
        $user = $this->userService->convertToResource($this->userService->getUserById(auth()->user()->id));
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $user
        ]);
    }

    public function showByEmail(User $user){
        $user = $this->userService->convertToResource($this->userService->getUserByEmail($user->email));
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
       $user = $this->userService->convertToResource($this->userService->createUser($request->validated()));
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
        $user = $this->userService->convertToResource($this->userService->updateUser($user,$request->validated()));
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

    public function addAddress(StoreAddressRequest $request) {
        // $user = $this->userService->addUserAddress(User::findOrFail(auth()->user()->id) ,$request->validated());
        $user = $this->userService->convertToResource($this->userService->addUserAddress(auth()->user(),$request->validated()));
       return response()->json([
        'status' => true,
        'message' => 'created successfully',
        'data' => $user
       ]);
    }

    public function updateAddress(UpdateAddressRequest $request, User $user){
        $user = $this->userService->convertToResource($this->userService->updateUserAddress(auth()->user(),$request->validated()));
       return response()->json([
        'status' => true,
        'message' => 'updated successfully',
        'data' => $user
       ]);
    }

    public function deleteAddress(){
        $user = $this->userService->deleteUserAddress(auth()->user());
       return response()->json([
        'status' => true,
        'message' => 'deleted successfully',
        'data' => []
       ]);
    }
}
