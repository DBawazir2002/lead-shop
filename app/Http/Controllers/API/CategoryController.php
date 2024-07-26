<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Interfaces\Category\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryServiceInterface $categoryService){
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $categories
        ]);
    }

    /**
     * Show the Country
     * @param $country
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function show(Category $category){
        $category = $this->categoryService->getCountryById($category->id);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $category
        ]);
    }



    /**
     * Show the Country via its name
     * @param string $name
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function showByName(string $name){
        $category = $this->categoryService->getCategoryByName($name);
        return response()->json([
            'status' => true,
            'message' => 'returned successfully',
            'data' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());
        return response()->json([
            'status' => true,
            'message' => 'created successfully',
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = $this->categoryService->updateCountry($category,$request->validated());
        return response()->json([
            'status' => true,
            'message' => 'updated successfully',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $is_deleted = $this->categoryService->deleteCountry($category);
        return response()->json([
            'status' => true,
            'message' => ($is_deleted) ? 'deleted successfully' : 'Error occur..',
            'data' => []
        ]);
    }
}
