<?php

namespace App\Services;

use App\Interfaces\Address\AddressRepositoryInterface;
use App\Interfaces\Address\AddressServiceInterface;
use App\Models\Address;
use App\Http\Resources\AddressResource;

class AddressService implements AddressServiceInterface
{
    private $addressService;
    /**
     * Create a new class instance.
     */
    public function __construct(AddressRepositoryInterface $addressService)
    {
        $this->addressService = $addressService;
    }

    public function getAllAddresses(){
        return AddressResource::collection($this->addressService->getAll());
    }

    public function getAddressById($id, $user=null){
        return ($user != null) ? Address::findOrFail($id): new AddressResource($this->addressService->getById($id));
    }

    public function createAddress(array $data){
        return new AddressResource($this->addressService->create($data));
    }

    public function updateAddress(Address $address,array $data){
        return new AddressResource($this->addressService->update($address, $data));
    }

    public function deleteAddress(Address $address){
        $is_deleted = false;
        if(auth()->check() and ( auth()->user()->hasRole('admin') or auth()->user()->hasRole('super-admin')) and auth()->user()->hasPermissionTo('delete addresses')){
            $is_deleted = $this->addressService->delete($address);
        }elseif(auth()->check()){
            $is_deleted = $this->addressService->delete($address);
        }
        return $is_deleted;
    }
}
