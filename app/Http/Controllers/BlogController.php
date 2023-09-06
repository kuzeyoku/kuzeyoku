<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\ModuleEnum;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    public function index()
    {
        $currentpage = Paginator::resolveCurrentPage() ?: 1;
        $posts = Cache::remember('blog_' . $currentpage, config("setting.caching.time", 3600), function () {
            return Blog::active()->order()->paginate(1);
        });
        $popularPost = Cache::remember('popular_blog', config("setting.caching.time", 3600), function () {
            return Blog::active()->order()->take(5)->get();
        });
        $categories = Cache::remember('category_blog', config("setting.caching.time", 3600), function () {
            return Category::active()->whereModule(ModuleEnum::Blog->value)->get();
        });
        return view("blog.index", compact("posts", "popularPost", "categories"));
    }

    public function show(Blog $post)
    {
        $post->increment("view_count");
        $previousPost = Cache::remember('previous_blog_' . $post->id, config("setting.caching.time", 3600), function () use ($post) {
            return Blog::active()->order()->where("id", "<", $post->id)->first();
        });
        $nextPost = Cache::remember('next_blog_' . $post->id, config("setting.caching.time", 3600), function () use ($post) {
            return Blog::active()->order()->where("id", ">", $post->id)->first();
        });
        return view("blog.show", compact("post", "previousPost", "nextPost"));
    }
}
