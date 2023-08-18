<?php

namespace App\Http\Controllers\admin;

use App\Enums\UserRole;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Services\Admin\UserService;
use Throwable;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
        view()->share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "roles" => UserRole::getSelectArray(),
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view('admin.user.index', compact('items'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $this->service->create((object)$request->validated());
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->name]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }
}
