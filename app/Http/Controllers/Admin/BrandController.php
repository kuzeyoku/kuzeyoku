<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Services\Admin\BrandService;

class BrandController extends Controller
{
    protected $service;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
        view()->share("route", $this->service->route());
        view()->share("folder", $this->service->folder());
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact("items"));
    }

    public function create()
    {
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StoreBrandRequest $request)
    {
        if ($this->service->create((object)$request->validated())) :
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log"));
            return redirect()->route("admin.{$this->service->folder()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        endif;
    }

    public function edit(Brand $brand)
    {
        return view("admin.{$this->service->folder()}.edit", compact("brand"));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if ($this->service->update((object)$request->validated(), $brand)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log"));
            return redirect()->route("admin.{$this->service->folder()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        endif;
    }

    public function destroy(Brand $brand)
    {
        if ($this->service->delete($brand)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
