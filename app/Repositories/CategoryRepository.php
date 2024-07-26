<?php

namespace App\Repositories;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll() : Category{
        return Category::all();
    }

    public function getById(int $id) : Category{
        return Category::findOrFail($id);
    }
    public function getByName(string $name) : Category{
        return Category::where('name', $name)->first();
    }

    public function create(array $data) : Category{
        $category = Category::create([
            'name' => $data['name'],
            'slug'=> $data['slug'],
            'description' => $data['description'],
        ]);
        return $category;
    }

    public function update(Category $category, array $data) : Category{
        $category->update($data);
        return $category;
    }

    public function delete(Category $category){
        return $category->delete();
    }
}
