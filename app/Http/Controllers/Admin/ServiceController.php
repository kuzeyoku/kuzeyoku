<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\Admin\ServiceService;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Enums\ModuleEnum;

class ServiceController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(ServiceService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Service->route();
        $this->folder = ModuleEnum::Service->folder();
        view()->share("categories", $this->service->getCategories(ModuleEnum::Blog));
        view()->share("route", $this->route);
        view()->share("folder", $this->folder);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->folder}.index", compact('items'));
    }

    public function create()
    {
        return view("admin.{$this->folder}.create");
    }

    public function store(StoreServiceRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Service $service)
    {
        return view("admin.{$this->folder}.edit", compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        if ($this->service->update((object)$request->validated(), $service))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Service $service)
    {
        if ($this->service->delete($service))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}