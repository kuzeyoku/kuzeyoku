<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Enums\ModuleEnum;
use App\Services\Admin\BlogService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Blog->route();
        $this->folder = ModuleEnum::Blog->folder();
        view()->share("categories", $this->service->getCategories(ModuleEnum::Blog));
        view()->share('route', $this->route);
        view()->share("folder", $this->folder);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->folder}.index", compact("items"));
    }

    public function create()
    {
        return view("admin.{$this->folder}.create");
    }

    public function store(StoreBlogRequest $request)
    {
        if ($this->service->create((object)$request->validated())) :
            LogController::logger("info", " Bir Blog Konusu Eklendi - " . $request->title[app()->getLocale()]);
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->folder}.create_error"));
        endif;
    }

    public function edit(Blog $blog)
    {
        return view("admin.{$this->folder}.edit", compact("blog"));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($this->service->update((object)$request->validated(), $blog))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Blog $blog)
    {
        if ($this->service->delete($blog))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
