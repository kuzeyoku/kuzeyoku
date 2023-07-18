<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Enums\ModuleEnum;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Services\Admin\BrandService;

class BrandController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Brand->route();
        $this->folder = ModuleEnum::Brand->folder();
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

    public function store(StoreBrandRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Brand $brand)
    {
        return view("admin.{$this->folder}.edit", compact("brand"));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if ($this->service->update((object)$request->validated(), $brand))
            return redirect()->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Brand $brand)
    {
        if ($this->service->delete($brand))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
