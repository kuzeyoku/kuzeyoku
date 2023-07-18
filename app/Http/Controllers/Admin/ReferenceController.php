<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reference;
use App\Enums\ModuleEnum;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Reference\StoreReferenceRequest;
use App\Http\Requests\Reference\UpdateReferenceRequest;
use App\Services\Admin\ReferenceService;

class ReferenceController extends Controller
{

    protected $service;
    protected $route;
    protected $folder;

    public function __construct(ReferenceService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Reference->route();
        $this->folder = ModuleEnum::Reference->folder();
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

    public function store(StoreReferenceRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin.{$this->folder}.create_error"));
    }

    public function edit(Reference $reference)
    {
        return view("admin.{$this->folder}.edit", compact("reference"));
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        if ($this->service->update((object)$request->validated(), $reference))
            return redirect()->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Reference $reference)
    {
        if ($this->service->delete($reference))
            return redirect()
                ->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}