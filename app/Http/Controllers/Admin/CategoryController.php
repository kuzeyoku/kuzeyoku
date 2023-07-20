<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Enums\ModuleEnum;

class CategoryController extends Controller
{
    protected $service;
    protected $modules;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
        $this->modules = ModuleEnum::toSelectArray();
        view()->share("categories", $this->service->getCategories());
        view()->share("modules", $this->modules);
        view()->share("route", $this->service->route());
        view()->share("folder", $this->service->folder());
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

    public function store(StoreCategoryRequest $request)
    {
        if ($this->service->create((object)$request->validated())) :
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

    public function edit(Category $category)
    {
        return view("admin.{$this->service->folder()}.edit", compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($this->service->update((object)$request->validated(), $category)) :
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

    public function destroy(Category $category)
    {
        if ($this->service->delete($category)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $category->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
