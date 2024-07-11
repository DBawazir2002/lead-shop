<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Interfaces\Address\AddressServiceInterface;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $addressService;

    public function __construct(AddressServiceInterface $addressService){
        $this->addressService = $addressService;
    }

    public function index(){
        $addresses = $this->addressService->getAllAddresses();

        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $addresses
           ]);
    }

    public function store(StoreAddressRequest $request){
        $address = $this->addressService->createAddress($request->validated());
        return response()->json([
            'status' => true,
            'message' => 'created successfully',
            'data' => $address
           ]);
    }

    public function show(Address $address){
        $address = $this->addressService->getAddressById($address->id);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $address
           ]);
    }


    public function update(UpdateAddressRequest $request,Address $address){
        $address = $this->addressService->updateAddress($address,$request->validated());
        return response()->json([
            'status' => true,
            'message' => 'updated successfully',
            'data' => $address
           ]);
    }

    public function destroy(Address $address){
        $is_deleted = $this->addressService->deleteAddress($address);
        return response()->json([
            'status' => true,
            'message' => ($is_deleted) ? 'deleted successfully' : 'Error occur..',
            'data' => []
           ]);
    }
}
