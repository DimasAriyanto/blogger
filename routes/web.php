<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Author\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/post', 'post')->name('post');
    Route::get('/detail/{post:slug}/detail', 'detailPost')->name('detail');
    Route::get('/category', 'category')->name('category');
    Route::get('/categoryPost/{category:slug}/categoryPost', 'categoryPost')->name('categoryPost');
    Route::get('/user', 'user')->name('user');
    Route::get('/userPost/{user:username}/userPost', 'userPost')->name('userPost');
    Route::get('/post/search', 'search')->name('search');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('auth.show-register-form');
    Route::post('/register', 'postRegister')->name('auth.post-register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('auth.show-login-form');
    Route::post('/login', 'postLogin')->name('auth.post-login');
    Route::post('/logout', 'postLogout')->name('auth.post-logout');
});

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

     Route::prefix('/author')->name('author.')->group(function () {
        Route::prefix('/post')->name('post.')->group(function () {
            // View response routes
            Route::get('/', [PostControllerr::class, 'index'])->name('index');
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::get('/{id}/show', [PostController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [PostController::class, 'store'])->name('store');
            Route::put('/{id}', [PostController::class, 'update'])->name('update');
            Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');
        });
    });
});
