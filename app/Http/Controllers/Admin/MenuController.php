<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\LogController;
use Exception;
use App\Models\Menu;
use App\Services\Admin\MenuService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;

class MenuController extends Controller
{
    protected $service;

    public function __construct(MenuService $service)
    {
        $this->authorizeResource(Menu::class);
        $this->service = $service;
        view()->share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
        ]);
    }

    public function index()
    {
    }

    public function header()
    {
        $this->authorize("index", Menu::class);
        $type = "header";
        $parentList = [0 => __("admin/general.select")];
        $parentList = array_merge($parentList, Menu::toSelectArray($type));
        return view("admin.{$this->service->folder()}.index", compact('type', "parentList"));
    }

    public function footer()
    {
        $this->authorize("index", Menu::class);
        $type = "footer";
        $parentList = [0 => __("admin/general.select")];
        $parentList = array_merge($parentList, Menu::toSelectArray($type));
        return view("admin.{$this->service->folder()}.index", compact('type', "parentList"));
    }

    public function edit()
    {
    }

    public function store(StoreMenuRequest $request)
    {
        $this->authorize("store", Menu::class);
        try {
            $this->service->create((object)$request->all());
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function update(UpdateMenuRequest $request)
    {
        dd($request->all());
    }
}
