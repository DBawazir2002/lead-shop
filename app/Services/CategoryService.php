<?php

namespace App\Services;

use App\Http\Resources\CategoryResourse;
use App\Interfaces\Category\CategoryServiceInterface;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{
    private $categoryRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories() {
        return CategoryResourse::collection($this->categoryRepository->getAll());
    }

    public function getCategoryById($id): CategoryResourse
    {
        return new CategoryResourse($this->categoryRepository->getById($id));
    }

    public function getByCategoryName(string $name): CategoryResourse
    {
        return new CategoryResourse($this->categoryRepository->getByName($name));
    }

    public function createCategory(array $data) {
        return new CategoryResourse($this->categoryRepository->create($data));
    }

    public function updateCategory(Category $category, array $data) {
        return new CategoryResourse($this->categoryRepository->update($category, $data));
    }

    public function deleteCategory(Category $category) {
        $is_deleted = false;
        if(auth()->user()->hasPermissionTo('delete categories')){
            $is_deleted = $this->categoryRepository->delete($category);
        }
        return $is_deleted;
    }
}
