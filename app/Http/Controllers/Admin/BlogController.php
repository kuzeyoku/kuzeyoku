<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Blog;
use App\Services\Admin\BlogService;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
    protected $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
        view()->share([
            "categories" => $this->service->getCategories(),
            "route" => $this->service->route(),
            "folder" => $this->service->folder()
        ]);
    }

    public function index()
    {
        $this->authorize("index", Blog::class);
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact("items"));
    }

    public function create()
    {
        $this->authorize("create", Blog::class);
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StoreBlogRequest $request)
    {
        $this->authorize("store", Blog::class);
        try {
            $this->service->create((object)$request->validated());
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getLocale()]]));
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

    public function edit(Blog $blog)
    {
        $this->authorize("edit", $blog);
        return view("admin.{$this->service->folder()}.edit", compact("blog"));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->authorize("update", $blog);
        try {
            $this->service->update((object)$request->validated(), $blog);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }

    public function destroy(Blog $blog)
    {
        $this->authorize("destroy", $blog);
        try {
            $this->service->delete($blog);
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $blog->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        }
    }
}
