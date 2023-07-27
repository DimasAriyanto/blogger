<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryServiceInterface
{
    public function getAll(): Collection;

    public function getBySlug(string $slug);
}
