<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Enums\ModuleEnum;
use App\Models\ProductImage;
use App\Services\Admin\ProductService;
use App\Http\Requests\Product\ImageProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
        view()->share("categories", $this->service->getCategories(ModuleEnum::Product));
        view()->share('route', $this->service->route());
        view()->share("folder", $this->service->folder());
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact('items'));
    }

    public function show(Product $product)
    {
        return view("admin.{$this->service->folder()}.show", compact('product'));
    }

    public function create()
    {
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StoreProductRequest $request)
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

    public function edit(Product $product)
    {
        return view("admin.{$this->service->folder()}.edit", compact("product"));
    }

    public function image(int $id)
    {
        $product = Product::find($id);
        return view("admin.{$this->service->folder()}.image", compact("product"));
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
            return back()->withSuccess(__("admin/{$this->service->folder()}.image.delete_success"));
        } else {
            return back()->withError(__("admin/{$this->service->folder()}.image.delete_error"));
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($this->service->update((object)$request->validated(), $product)) :
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

    public function destroy(Product $product)
    {
        if ($this->service->delete($product)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $product->title[app()->getLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
