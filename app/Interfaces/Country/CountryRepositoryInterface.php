<?php

namespace App\Interfaces\Interfaces;

use App\Models\Country;

interface CountryRepositoryInterface
{
    public function getAll();
    public function getById(int $id);

    public function getByName(string $name);
    
    public function getByCode(string $code);

    public function create(array $data);

    public function update(Country $country, array $data);

    public function delete(Country $country);
}
