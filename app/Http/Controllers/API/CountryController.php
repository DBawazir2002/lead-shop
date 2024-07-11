<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Interfaces\Country\CountryServiceInterface;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $countryService;
    public function __construct(CountryServiceInterface $countryService){
        $this->countryService = $countryService;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countrys = $this->countryService->getAllCountries();
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $countrys
        ]);
    }

    public function show($id){
        $country = $this->countryService->getCountryById($id);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $country
           ]);
    }

    public function showByCode(string $code){
        $country = $this->countryService->getCountryByCode($code);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $country
           ]);
    }

    public function showByName(string $code){
        $country = $this->countryService->getCountryByCode($code);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $country
           ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
       $country = $this->countryService->createCountry($request->validated());
       return response()->json([
        'status' => true,
        'message' => 'created successfully',
        'data' => $country
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country = $this->countryService->updateCountry($country,$request->validated());
       return response()->json([
        'status' => true,
        'message' => 'updated successfully',
        'data' => $country
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $is_deleted = $this->countryService->deleteCountry($country);
        return response()->json([
            'status' => true,
            'message' => ($is_deleted) ? 'deleted successfully' : 'Error occur..',
            'data' => []
           ]);
    }
}
