<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Cache::remember("sliders", config("setting.caching.time", 3600), function () {
            return Slider::active()->order()->get();
        });
        $services = Cache::remember("services", config("setting.caching.time", 3600), function () {
            return Service::active()->order()->get();
        });
        $brands = Cache::remember("brands", config("setting.caching.time", 3600), function () {
            return Brand::active()->order()->get();
        });
        $projects = Cache::remember("projects", config("setting.caching.time", 3600), function () {
            return Project::active()->order()->get();
        });
        $testimonials = Cache::remember("testimonials", config("setting.caching.time", 3600), function () {
            return Testimonial::active()->order()->get();
        });
        $blogs = Cache::remember("blogs", config("setting.caching.time", 3600), function () {
            return Blog::active()->order()->get();
        });
        return view("index", compact("sliders", "services", "brands", "projects", "testimonials", "blogs"));
    }
}
