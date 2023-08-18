<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Throwable;
use Illuminate\Http\Request;
use App\Services\Admin\SettingService;

class SettingController extends Controller
{
    private $service;

    public function __construct(SettingService $service)
    {
        $this->authorizeResource(Setting::class);
        $this->service = $service;
        view()->share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "service" => $service
        ]);
    }

    public function index()
    {
        // $this->authorize(Setting::class, "settingIndex");
        return view("admin.{$this->service->folder()}.index");
    }

    public function update(Request $request)
    {
        //$this->authorize(Setting::class, "settingUpdate");
        try {
            $this->service->update($request);
            LogController::Logger("info", __("admin/{$this->service->folder()}.update_log", ["category" => __("admin/setting.category." . $request->category)]));
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::Logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }
}
