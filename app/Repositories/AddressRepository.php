<?php

namespace App\Repositories;

use App\Http\Resources\AddressResource;
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
        return AddressResource::collection(Address::all());
    }

    public function getById($id){
        return new AddressResource(Address::findOrFail($id));
    }
    
    public function create(array $data){
        $address = Address::create($data);
        return new AddressResource($address);
    }

    public function update(Address $address, array $data){
        $address->update($data);
        return new AddressResource($address);
    }

    public function delete(Address $address){
        return $address->delete();
    }
}
