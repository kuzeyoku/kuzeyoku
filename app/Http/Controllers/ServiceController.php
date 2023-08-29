<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Reference;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->order()->get();
        $references = Reference::active()->order()->get();
        return view("service.index", compact("services", "references"));
    }

    public function show(Service $service)
    {
        $other = Service::getOther($service->id, 3);
        return view("service.show", compact("service", "other"));
    }
}
