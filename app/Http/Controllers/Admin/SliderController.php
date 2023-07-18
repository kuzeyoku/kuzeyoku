<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Services\Admin\SliderService;
use App\Http\Requests\Slider\StoreSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Enums\ModuleEnum;

class SliderController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(SliderService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Slider->route();
        $this->folder = ModuleEnum::Slider->folder();
        view()->share("route", $this->route);
        view()->share("folder", $this->folder);
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

    public function store(StoreSliderRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Slider $slider)
    {
        return view("admin.{$this->folder}.edit", compact("slider"));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if ($this->service->update((object)$request->validated(), $slider))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Slider $slider)
    {
        if ($this->service->delete($slider))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
