<?php

namespace App\Repositories;

use App\Interfaces\Country\CountryRepositoryInterface;
use App\Models\Country;
class CountryRepository implements CountryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(){
        return Country::with('cities')->get();
    }

    public function getById($id){
        return Country::with('cities')->findOrFail($id);
    }

    public function getByCode(string $code){
        return Country::where('code', $code)->with('cities')->first();
    }

    public function getByName(string $name){
        return Country::where('name', $name)->with('cities')->first();
    }

    public function create(array $data){
        $country = Country::create([
            'name' => $data['name'],
            'code'=> $data['code'],
        ]);

        return $country;
    }

    public function update(Country $country, array $data){
        $country->update($data);
        return $country;
    }

    public function delete(Country $country){
        return $country->delete();
    }
}
