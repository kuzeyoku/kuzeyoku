<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ModuleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\Admin\TestimonialService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(TestimonialService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Testimonial->route();
        $this->folder = ModuleEnum::Testimonial->folder();
        view()->share("folder", $this->folder);
        view()->share("route", $this->route);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->folder}.index", compact("items"));
    }

    public function create()
    {
        return view("admin.{$this->folder}.create");
    }

    public function store(StoreTestimonialRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Testimonial $testimonial)
    {
        return view("admin.{$this->folder}.edit", compact("testimonial"));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        if ($this->service->update((object)$request->validated(), $testimonial))
            return redirect()
                ->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($this->service->delete($testimonial))
            return redirect()
                ->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
