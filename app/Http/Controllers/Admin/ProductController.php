<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Enums\ModuleEnum;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use App\Http\Requests\Product\ImageProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    protected $service;
    protected $route;
    protected $folder;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
        $this->route = ModuleEnum::Product->route();
        $this->folder = ModuleEnum::Product->folder();
        view()->share("categories", $this->service->getCategories(ModuleEnum::Product));
        view()->share('route', $this->route);
        view()->share("folder", $this->folder);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->folder}.index", compact('items'));
    }

    public function show(Product $product)
    {
        return view("admin.{$this->folder}.show", compact('product'));
    }

    public function create()
    {
        return view("admin.{$this->folder}.create");
    }

    public function store(StoreProductRequest $request)
    {
        if ($this->service->create((object)$request->validated()))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Product $product)
    {
        return view("admin.{$this->folder}.edit", compact("product"));
    }

    public function image(int $id)
    {
        $product = Product::find($id);
        return view("admin.{$this->folder}.image", compact("product"));
    }

    public function imageStore(ImageProductRequest $request): object
    {
        $validatedData = (object) $request->validated();

        if ($this->service->imageUpload($validatedData)) {
            return (object) [
                "message" => __("admin/product.image.success")
            ];
        } else {
            return (object) [
                "message" => __("admin/product.image.error")
            ];
        }
    }

    public function imageDestroy(int $id)
    {
        $image = ProductImage::find($id);
        if ($this->service->imgDelete($image, true)) {
            return back()->withSuccess(__("admin/{$this->folder}.image.delete_success"));
        } else {
            return back()->withError(__("admin/{$this->folder}.image.delete_error"));
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($this->service->update((object)$request->validated(), $product))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Product $product)
    {
        if ($this->service->delete($product))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
