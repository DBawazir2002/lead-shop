<?php

namespace App\Interfaces\Address;

use App\Models\Address;

interface AddressRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function update(Address $address,array $data);

    public function delete(Address $address);
}
