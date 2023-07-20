<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Services\Admin\PageService;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;

class PageController extends Controller
{
    protected $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
        view()->share('route', $this->service->route());
        view()->share('folder', $this->service->folder());
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact('items'));
    }

    public function create()
    {
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StorePageRequest $request)
    {
        if ($this->service->create($request)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        endif;
    }

    public function edit(Page $page)
    {
        return view("admin.{$this->service->folder()}.edit", compact("page"));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        if ($this->service->update($request, $page)) :
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

    public function destroy(Page $page)
    {
        if ($this->service->delete($page)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $page->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
