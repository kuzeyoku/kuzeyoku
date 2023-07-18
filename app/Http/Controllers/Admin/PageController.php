<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Page;
use App\Services\Admin\PageService;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Enums\ModuleEnum;

class PageController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(PageService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Page->route();
        $this->folder = ModuleEnum::Page->folder();
        view()->share('route', $this->route);
        view()->share('folder', $this->folder);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->folder}.index", compact('items'));
    }

    public function create()
    {
        return view("admin.{$this->folder}.create");
    }

    public function store(StorePageRequest $request)
    {
        if ($this->service->create($request))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Page $page)
    {
        return view("admin.{$this->folder}.edit", compact("page"));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        if ($this->service->update($request, $page))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Page $page)
    {
        if ($this->service->delete($page))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
