<?php

namespace App\Interfaces\City;

use App\Models\City;

interface CityServiceInterface
{
    public function getAllCities();

    public function getCityById($id);

    public function getCityByName(string $id);

    public function createCity(array $data);

    public function updateCity(City $city,array $data);

    public function deleteCity(City $city);
}
