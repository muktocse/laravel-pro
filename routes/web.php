<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\WebsiteController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogsController;

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/category-blog', [WebsiteController::class, 'categoryBlog'])->name('category-blog');
Route::get('/blog-details', [WebsiteController::class, 'blogDetails'])->name('blog-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard');

    Route::get('/create-blog-category', [BlogCategoryController::class, 'create'])->name('blog-categories.create');
    Route::post('/store-blog-category', [BlogCategoryController::class, 'store'])->name('blog-categories.store');
    Route::get('/manage-blog-category', [BlogCategoryController::class, 'manage'])->name('blog-categories.manage');
    Route::get('/edit-blog-category', [BlogCategoryController::class, 'edit'])->name('blog-categories.edit');
    Route::post('/update-blog-category', [BlogCategoryController::class, 'update'])->name('blog-categories.update');
    Route::get('/delete-blog-category', [BlogCategoryController::class, 'delete'])->name('blog-categories.delete');


    Route::get('/create-blog', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/store-blog', [BlogsController::class, 'store'])->name('blogs.store');
    Route::get('/manage-blog', [BlogsController::class, 'manage'])->name('blogs.manage');
    Route::get('/edit-blog', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::post('/update-blog', [BlogsController::class, 'update'])->name('blogs.update');
    Route::get('/delete-blog', [BlogsController::class, 'delete'])->name('blogs.delete');

});
