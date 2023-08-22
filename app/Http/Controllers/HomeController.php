<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Service;
use App\Enums\StatusEnum;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::whereStatus(StatusEnum::Active->value)->orderby("order")->get();
        $services = Service::whereStatus(StatusEnum::Active->value)->orderby("order")->get();

        return view("index", compact("sliders"));
    }
}
