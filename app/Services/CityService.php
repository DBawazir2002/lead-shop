<?php

namespace App\Services;

use App\Interfaces\City\CityRepositoryInterface;
use App\Interfaces\City\CityServiceInterface;
use App\Models\City;
use App\Http\Resources\CityResource;

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
        return CityResource::collection($this->cityRepository->getAll());
    }

    public function getCityById($id){
        return new CityResource($this->cityRepository->getById($id));
    }

    public function getCityByName(string $name){
        return new CityResource($this->cityRepository->getByName($name));
    }

    public function createCity(array $data){
        return new CityResource($this->cityRepository->create($data));
    }

    public function updateCity(City $city,array $data){
        return new CityResource($this->cityRepository->update($city, $data));
    }

    public function deleteCity(City $city){
        $is_deleted = false;
        if(auth()->user()->hasPermissionTo('delete cities')){
            $is_deleted = $this->cityRepository->delete($city);
        }
        return $is_deleted;
    }
}
