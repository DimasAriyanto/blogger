<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function getBySlug(string $slug)
    {
        $post = $this->postRepository->getBySlug($slug);
        if (!$post) {
            throw new ModelNotFoundException('Post dengan slug ' . $slug . ' tidak ditemukan');
        }

        return $post;
    }

    public function search(string $title)
    {
        return $this->postRepository->search($title);
    }
}
