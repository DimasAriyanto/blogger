<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService implements CategoryServiceInterface
{
    protected $catagoryRepository;

    public function __construct(CategoryRepositoryInterface $catagoryRepository) {
        $this->catagoryRepository = $catagoryRepository;
    }
    public function getAll(): Collection
    {
        return $this->catagoryRepository->getAll();
    }

    public function getBySlug(string $slug)
    {
        $category = $this->catagoryRepository->getBySlug($slug);
        if (!$category) {
            throw new ModelNotFoundException('Category dengan slug ' . $slug . ' tidak ditemukan');
        }

        return $category;
    }
}
