<?php

namespace App\Interfaces\Category;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll() ;

    public function getById(int $id);
    public function getByName(string $name);

    public function create(array $data);

    public function update(Category $category, array $data);

    public function delete(Category $category);
}
