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
        $countries = $this->countryService->getAllCountries();
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $countries
        ]);
    }

    /**
     * Show the Country
     * @param $country
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function show(Country $country){
        $country = $this->countryService->getCountryById($country->id);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $country
           ]);
    }

    /**
     * Show the Country via its code
     * @param string $code
     * @return mixed|\Illuminate\Http\JsonResponse
     */

    public function showByCode(string $code){
        $country = $this->countryService->getCountryByCode($code);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $country
           ]);
    }

    /**
     * Show the Country via its name
     * @param string $name
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function showByName(string $name){
        $country = $this->countryService->getCountryByName($name);
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
