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
        $post->increment("view_count");
        $previousPost = Blog::active()->order()->where("id", "<", $post->id)->first();
        $nextPost = Blog::active()->order()->where("id", ">", $post->id)->first();
        return view("blog.show", compact("post", "previousPost", "nextPost"));
    }
}
