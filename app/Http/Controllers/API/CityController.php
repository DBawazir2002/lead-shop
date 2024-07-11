<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Interfaces\City\CityServiceInterface;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $cityService;
    public function __construct(CityServiceInterface $cityService){
        $this->cityService = $cityService;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = $this->cityService->getAllCities();
        return response()->json([
         'status' => true,
         'message' => 'returned successfully',
         'data' => $cities
        ]);
    }

    /**
     * Show the Country
     * @param $city
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function show(City $city){
        $city = $this->cityService->getCityById($city->id);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $city
           ]);
    }

    /**
     * Show the City via its name
     * @param string $name
     * @return mixed|\Illuminate\Http\JsonResponse
     */

    public function showByName(string $name){
        $city = $this->cityService->getCityByName($name);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $city
           ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
       $city = $this->cityService->createCity($request->validated());
       return response()->json([
        'status' => true,
        'message' => 'created successfully',
        'data' => $city
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city = $this->cityService->updateCity($city,$request->validated());
       return response()->json([
        'status' => true,
        'message' => 'updated successfully',
        'data' => $city
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $is_deleted = $this->cityService->deleteCity($city);
        return response()->json([
            'status' => true,
            'message' => ($is_deleted) ? 'deleted successfully' : 'Error occur..',
            'data' => []
           ]);
    }
}
