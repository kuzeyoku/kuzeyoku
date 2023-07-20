<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reference;
use App\Http\Requests\Reference\StoreReferenceRequest;
use App\Http\Requests\Reference\UpdateReferenceRequest;
use App\Services\Admin\ReferenceService;

class ReferenceController extends Controller
{

    protected $service;
    public function __construct(ReferenceService $service)
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

    public function store(StoreReferenceRequest $request)
    {
        if ($this->service->create((object)$request->validated())) :
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log"));
            return redirect()->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin.{$this->service->folder()}.create_error"));
        endif;
    }

    public function edit(Reference $reference)
    {
        return view("admin.{$this->service->folder()}.edit", compact("reference"));
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        if ($this->service->update((object)$request->validated(), $reference)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log"));
            return redirect()->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        endif;
    }

    public function destroy(Reference $reference)
    {
        if ($this->service->delete($reference)) :
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
