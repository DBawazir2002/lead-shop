<?php

namespace App\Interfaces\Country;

use App\Models\Country;

interface CountryServiceInterface
{
    public function getAllCountries();
    
    public function getCountryById(int $id);

    public function getCountryByName(string $name);

    public function getCountryByCode(string $name);
    public function createCountry(array $data);

    public function updateCountry(Country $country, array $data);

    public function deleteCountry(Country $country);
}
