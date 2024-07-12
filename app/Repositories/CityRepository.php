<?php

namespace App\Repositories;

use App\Interfaces\City\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(){
        return City::with('country')->get();
    }

    public function getById($id){
        return City::with('country')->findOrFail($id);
    }

    public function getByName(string $name){
        return City::where('name', $name)->with('country')->first();
    }

    public function create(array $data){
        $city = City::create([
            'name' => $data['name'],
            'country_id' => $data['country_id']
        ]);

        return $city;
    }

    public function update(City $city, array $data){
        $city->update($data);
        return $city;
    }

    public function delete(City $city){
        return $city->delete();
    }
}
