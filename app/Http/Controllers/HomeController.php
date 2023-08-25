<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Enums\StatusEnum;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->order()->get();
        $services = Service::active()->order()->limit(4)->get();
        $brands = Brand::active()->order()->get();
        $projects = Project::active()->order()->get();
        $testimonials = Testimonial::active()->order()->get();
        $blogs = Blog::active()->order()->get();
        return view("index", compact("sliders", "services", "brands", "projects", "testimonials", "blogs"));
    }
}
