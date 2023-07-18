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
    protected $route;
    protected $folder;
    protected $modules;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Category->route();
        $this->folder = ModuleEnum::Category->folder();
        $this->modules = ModuleEnum::toSelectArray();
        view()->share("categories", $this->service->getCategories());
        view()->share("modules", $this->modules);
        view()->share("route", $this->route);
        view()->share("folder", $this->folder);
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

    public function store(StoreCategoryRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Category $category)
    {
        return view("admin.{$this->folder}.edit", compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($this->service->update((object)$request->validated(), $category))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Category $category)
    {
        if ($this->service->delete($category))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
