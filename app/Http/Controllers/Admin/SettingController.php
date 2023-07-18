<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Services\Admin\SettingService;
use Helpers;

class SettingController extends Controller
{
    private $service;
    private $folder;
    private $route;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
        $this->folder = "setting";
        $this->route = "setting";
        view()->share("folder", $this->folder);
        view()->share("route", $this->route);
    }

    public function index()
    {
        $pagelist = array_merge([__("admin/general.select")], $this->service->pageList());
        return view("admin.{$this->folder}.index", compact("pagelist"));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return back()->withSuccess(__("admin/{$this->folder}.update_success"));
    }
}
