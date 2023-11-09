<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Enums\ModuleEnum;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $modules = [ //Eklenecek modülün module enumdaki değerini ve modelini buraya ekleyin.
            ModuleEnum::Slider->value => Slider::class,
            ModuleEnum::Service->value => Service::class,
            ModuleEnum::Brand->value => Brand::class,
            ModuleEnum::Project->value => Project::class,
            ModuleEnum::Testimonial->value => Testimonial::class,
            ModuleEnum::Blog->value => Blog::class,
        ];

        $data = [];

        foreach ($modules as $module => $model) {
            $cacheKey = $module . "_home";
            if (config("setting.caching.status", false)) { // Cache aktif ise cache'den verileri çekiyoruz.
                $data[$module] = Cache::remember($cacheKey, config("setting.caching.time", 3600), function () use ($model) {
                    return $model::active()->order()->get();
                });
            } else { // Cache aktif değilse veritabanından çekiyoruz.
                $data[$module] = $model::active()->order()->get();
            }
        }

        return view("index", $data);
    }
}
