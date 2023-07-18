<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ModuleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Popup\StorePopupRequest;
use App\Http\Requests\Popup\UpdatePopupRequest;
use App\Services\Admin\PopupService;
use App\Models\Popup;

class PopupController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(PopupService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Popup->route();
        $this->folder = ModuleEnum::Popup->folder();
        view()->share("route", $this->route);
        view()->share("folder", $this->folder);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->route}.index", compact("items"));
    }

    public function create()
    {
        return view("admin.{$this->folder}.create");
    }

    public function store(StorePopupRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()
                ->route("admin.{$this->folder}.index")
                ->withSuccess(__("admin/{$this->folder}.index"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Popup $popup)
    {
        return view("admin.{$this->folder}.edit", compact("popup"));
    }

    public function update(UpdatePopupRequest $request, Popup $popup)
    {
        if ($this->service->update((object)$request->validated(), $popup))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Popup $popup)
    {
        if ($this->service->delete($popup))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
