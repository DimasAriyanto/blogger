<?php

namespace App\Services\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostServiceInterface
{
    public function getAll();

    public function getBySlug(string $slug);

    public function search(string $title);
}
