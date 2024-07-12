<?php

namespace App\Repositories;

use App\Interfaces\Address\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(){
        return Address::all();
    }

    public function getById($id){
        return Address::findOrFail($id);
    }

    public function create(array $data){
        $address = Address::create($data);
        return $address;
    }

    public function update(Address $address, array $data){
        $address->update($data);
        return $address;
    }

    public function delete(Address $address){
        return $address->delete();
    }
}
