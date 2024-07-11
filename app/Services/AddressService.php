<?php

namespace App\Services;

use App\Interfaces\Address\AddressRepositoryInterface;
use App\Interfaces\Address\AddressServiceInterface;
use App\Models\Address;

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
        return $this->addressService->getAll();
    }

    public function getAddressById($id){
        return $this->addressService->getById($id);
    }

    public function getAddress($id){
        return Address::findOrFail($id);
    }

    public function createAddress(array $data){
        return $this->addressService->create($data);
    }

    public function updateAddress(Address $address,array $data){
        return $this->addressService->update($address, $data);
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
