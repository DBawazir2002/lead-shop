<?php

namespace App\Interfaces\Category;

use App\Models\Category;

interface CategoryServiceInterface
{
    public function getAllCategories();

    public function getCategoryById(int $id);

    public function getByCategoryName(string $name);

    public function createCategory(array $data);

    public function updateCategory(Category $category, array $data);

    public function deleteCategory(Category $category);
}
