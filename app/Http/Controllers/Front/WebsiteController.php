<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    protected $blogs;
    public function home()
    {
        $this->blogs = Blog::all();
        return view('frontend.home.home', [
            'blogs' => $this->blogs
        ]);
    }
    public function categoryBlog()
    {
        return view('frontend.blogs.category-blog');
    }
    public function blogDetails()
    {
        return view('frontend.blogs.details');
    }

    public function dashboard()
    {
        return view('backend.dashboard.dashboard');
    }
}
