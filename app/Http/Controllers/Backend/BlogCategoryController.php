<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function create()
    {
        return view('backend.blog-category.create');
    }
    public function store(Request $request)
    {
        BlogCategory::createBlogCategory($request);
        return back()->with('success', 'Category created successfully.');
    }
    public function manage()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
