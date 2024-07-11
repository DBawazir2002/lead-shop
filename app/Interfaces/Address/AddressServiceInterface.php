<?php

namespace App\Interfaces\Address;

use App\Models\Address;

interface AddressServiceInterface
{
    public function getAllAddresses();

    public function getAddressById($id);

    /**
     * Get \App\Models\Address by id not \App\Http\Resources\AddressResource
     * @param mixed $id
     */
    public function getAddress($id);

    public function createAddress(array $data);

    public function updateAddress(Address $address,array $data);

    public function deleteAddress(Address $address);
}
