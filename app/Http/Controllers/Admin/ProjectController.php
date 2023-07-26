<?php

namespace App\Http\Controllers\admin;

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
    public function store(StoreProductRequest $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
