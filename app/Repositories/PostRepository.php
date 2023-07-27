<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        return Post::paginate(7);
    }

    public function getBySlug(string $slug)
    {
        return Post::where('slug', $slug)->first();
    }

    public function search(string $title)
    {
        return Post::where('title', 'LIKE', "%$title%")->paginate(7);
    }
}
