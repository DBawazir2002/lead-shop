<?php

namespace App\Services;

use App\Interfaces\City\CityRepositoryInterface;
use App\Interfaces\City\CityServiceInterface;
use App\Models\City;

class CityService implements CityServiceInterface
{
    private $cityRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getAllCities(){
        return $this->cityRepository->getAll();
    }

    public function getCityById($id){
        return $this->cityRepository->getById($id);
    }

    public function getCityByName(string $name){
        return $this->cityRepository->getByName($name);
    }

    public function createCity(array $data){
        return $this->cityRepository->create($data);
    }

    public function updateCity(City $city,array $data){
        return $this->cityRepository->update($city, $data);
    }

    public function deleteCity(City $city){
        $is_deleted = false;
        if(auth()->user()->hasPermissionTo('delete cities')){
            $is_deleted = $this->cityRepository->delete($city);
        }
        return $is_deleted;
    }
}
