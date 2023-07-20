<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Popup\StorePopupRequest;
use App\Http\Requests\Popup\UpdatePopupRequest;
use App\Services\Admin\PopupService;
use App\Models\Popup;

class PopupController extends Controller
{
    protected $service;

    public function __construct(PopupService $service)
    {
        $this->service = $service;
        view()->share("route", $this->service->route());
        view()->share("folder", $this->service->folder());
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->service->route()}.index", compact("items"));
    }

    public function create()
    {
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StorePopupRequest $request)
    {
        if ($this->service->create((object)$request->validated())) :
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->folder()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.index"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        endif;
    }

    public function edit(Popup $popup)
    {
        return view("admin.{$this->service->folder()}.edit", compact("popup"));
    }

    public function update(UpdatePopupRequest $request, Popup $popup)
    {
        if ($this->service->update((object)$request->validated(), $popup)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        endif;
    }

    public function destroy(Popup $popup)
    {
        if ($this->service->delete($popup)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $popup->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
