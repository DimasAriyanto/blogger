<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\PostServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(
        protected PostServiceInterface $postService,
        protected CategoryServiceInterface $categoryService,
        protected UserServiceInterface $userService
    ) {
    }

    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function post(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $posts = $this->postService->search($query);
        } else {
            $posts = $this->postService->getAll();
        }
        return view('post', compact('posts'));
    }

    public function detailPost(string $slug)
    {
        $post = $this->postService->getBySlug($slug);
        return view('detailPost', compact('post'));
    }

    public function category()
    {
        $categories = $this->categoryService->getAll();
        return view('category', compact('categories'));
    }

    public function categoryPost(string $slug)
    {
        $category = $this->categoryService->getBySlug($slug);
        return view('categoryPost', compact('category'));
    }

    public function user()
    {
        $users = $this->userService->getAll();
        return view('user', compact('users'));
    }

    public function userPost(string $username)
    {
        $user = $this->userService->getByUsername($username);
        return view('userPost', compact('user'));
    }
}
