<?php

namespace App\Repositories;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll() {
        return Category::with('products')->get();
    }

    public function getById(int $id) {
        return Category::with('products')->findOrFail($id);
    }
    public function getByName(string $name) {
        return Category::where('name', $name)->with('products')->first();
    }

    public function create(array $data) {
        $category = Category::create([
            'name' => $data['name'],
            'slug'=> Str::slug($data['slug']),
            'description' => $data['description'],
        ]);
        return $category;
    }

    public function update(Category $category, array $data) {
        $data['slug'] = Str::slug($data['slug']);
        $category->update($data);
        return $category;
    }

    public function delete(Category $category){
        return $category->delete();
    }
}
