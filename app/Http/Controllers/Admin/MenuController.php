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
        $this->authorizeResource("menu", Menu::class);
        $this->service = $service;
        view()->share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
        ]);
    }

    public function header($type = "header", $menu = null)
    {
        return $this->renderMenuView($type, $menu);
    }

    public function footer($type = "footer", $menu = null)
    {
        return $this->renderMenuView($type, $menu);
    }

    public function renderMenuView($type, $menu)
    {
        $menus = Menu::whereType($type)->order()->get();
        $parentList = [0 => __("admin/general.select")];
        $parentList = array_merge($parentList, Menu::toSelectArray($type));
        return view("admin.{$this->service->folder()}.index", compact('menus', 'type', "parentList", "menu"));
    }

    public function edit(Menu $menu)
    {
        if ($menu->type == "header")
            return $this->header($menu->type, $menu);
        elseif ($menu->type == "footer")
            return $this->footer($menu->type, $menu);
        else
            return back()->withError(__("admin/{$this->service->folder()}.edit_error"));
    }

    public function store(StoreMenuRequest $request)
    {
        try {
            $this->service->create((object)$request->all());
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.$request->type")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            $this->service->update((object)$request->all(), $menu);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.$request->type")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }
}
