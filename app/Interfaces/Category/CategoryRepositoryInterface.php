<?php

namespace App\Interfaces\Category;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll() : Category;

    public function getById(int $id) : Category;
    public function getByName(string $name);

    public function create(array $data) : Category;

    public function update(Category $category, array $data) : Category;

    public function delete(Category $category);
}
