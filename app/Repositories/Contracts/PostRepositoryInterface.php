<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function getAll();

    public function getBySlug(string $slug);

    public function search(string $title);
}
