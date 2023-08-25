<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::active()->order()->get();
        $popularPost = Blog::active()->viewOrder()->limit(5)->get();
        $categories = Category::whereModule(ModuleEnum::Blog->value)->get();
        return view("blog.index", compact("posts", "popularPost", "categories"));
    }

    public function show(Blog $post)
    {
        return view("blog.show", compact("post"));
    }
}
