<?php

namespace App\Services;

use App\Http\Resources\CountryResource;
use App\Interfaces\Country\CountryServiceInterface;
use App\Interfaces\Country\CountryRepositoryInterface;
use App\Models\Country;

class CountryService implements CountryServiceInterface
{
    private $countryRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries(){
        return $this->countryRepository->getAll();
    }

    public function getCountryById($id){
        return $this->countryRepository->getById($id);
    }

    public function getCountryByName(string $name){
        return $this->countryRepository->getByName($name);
    }

    public function getCountryByCode(string $code){
        return $this->countryRepository->getByCode($code);
    }

    public function createCountry(array $data) {
        return $this->countryRepository->create($data);
    }

    public function updateCountry(Country $country, array $data) {
        return $this->countryRepository->update($country, $data);
    }

    public function deleteCountry(Country $country) {
        $is_deleted = false;
        if(auth()->user()->hasPermissionTo('delete countries')){
            $is_deleted = $this->countryRepository->delete($country);
        }
        return $is_deleted;
    }

}
