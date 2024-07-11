<?php

namespace App\Interfaces\City;

use App\Models\City;

interface CityRepositoryInterface
{
    public function getAll();
    public function getById(int $id);

    public function getByName(string $name);

    public function create(array $data);

    public function update(City $city, array $data);

    public function delete(City $city);
}
