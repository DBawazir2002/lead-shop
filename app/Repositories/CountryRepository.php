<?php

namespace App\Repositories;

use App\Http\Resources\CountryResource;
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
        return CountryResource::collection(Country::with('cities')->get());
    }

    public function getById($id){
        return new CountryResource(Country::with('cities')->findOrFail($id));
    }

    public function getByCode(string $code){
        return new CountryResource(Country::where('code', $code)->with('cities')->first());
    }

    public function getByName(string $name){
        return new CountryResource(Country::where('name', $name)->with('cities')->first());
    }

    public function create(array $data){
        $country = Country::create([
            'name' => $data['name'],
            'code'=> $data['code'],
        ]);

        return new CountryResource($country);
    }

    public function update(Country $country, array $data){
        $country->update($data);
        return new CountryResource($country);
    }

    public function delete(Country $country){
        return $country->delete();
    }
}
