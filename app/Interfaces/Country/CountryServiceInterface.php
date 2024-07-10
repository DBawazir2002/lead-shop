<?php

namespace App\Interfaces\Country;

use App\Models\Country;

interface CountryServiceInterface
{
    public function getAllUsers();
    public function getCountryById(int $id);

    public function getCountryByName(string $name);

    public function createCountry(array $data);

    public function updateCountry(Country $country, array $data);

    public function deleteCountry(Country $country);
}
