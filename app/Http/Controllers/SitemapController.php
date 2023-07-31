<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Project;

use App\Models\Product;

class SitemapController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $pages = \App\Models\Page::where("status", StatusEnum::Active->value)->get();
        $posts = \App\Models\Blog::where("status", StatusEnum::Active->value)->get();
        $categories = \App\Models\Category::where("status", StatusEnum::Active->value)->get();
        $services = \App\Models\Service::where("status", StatusEnum::Active->value)->get();
        $projects = \App\Models\Project::where("status", StatusEnum::Active->value)->get();
        $products = \App\Models\Product::where("status", StatusEnum::Active->value)->get();
        $view = view("sitemap", compact("pages", "posts", "categories", "services", "projects", "products"));
        return response($view)->header("Content-Type", "text/xml");
    }
}
