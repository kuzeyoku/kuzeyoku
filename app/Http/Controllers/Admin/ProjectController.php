<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\LogController;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Throwable;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Services\Admin\ProjectService;
use App\Http\Requests\Project\ImageProjectRequest;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;


class ProjectController extends Controller
{

    protected $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
        view()->share([
            "categories" => $this->service->getCategories(),
            "folder" => $this->service->folder(),
            "route" => $this->service->route(),
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.{$this->service->folder()}.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $this->service->create((object)$request->validated());
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin/{$this->service->route()}.index")
                ->with("success", __("admin/{$this->service->folder()}.create_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("admin/{$this->service->folder()}/edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $this->service->update((object)$request->validated(), $project);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->title[app()->getLocale()]]));
            return redirect()
                ->route("admin/{$this->service->route()}.index")
                ->with("success", __("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $this->service->delete($project);
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $project->title[app()->getLocale()]]));
            return redirect()
                ->route("admin/{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        }
    }
}
