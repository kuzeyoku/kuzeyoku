<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Services\Admin\SettingService;

class SettingController extends Controller
{
    private $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
        view()->share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder()
        ]);
    }

    public function index()
    {
        $pagelist = array_merge([__("admin/general.select")], $this->service->pageList());
        return view("admin.{$this->service->folder()}.index", compact("pagelist"));
    }

    public function update(Request $request)
    {
        try {
            $this->service->update($request);
            LogController::Logger("info", __("admin/{$this->service->folder()}.update_log", ["category" => __("admin/setting.category." . $request->category)]));
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::Logger("error", $e->getMessage());
            return back()
                ->withErrors(__("admin/{$this->service->folder()}.update_error"));
        }
    }
}
