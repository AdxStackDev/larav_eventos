<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return Category::with(['events', 'tickets', 'subscriptions'])->get();
    }

    public function getCategoryWithRelations($id)
    {
        return Category::with(['events', 'tickets', 'subscriptions'])->find($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->update($data, $id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
