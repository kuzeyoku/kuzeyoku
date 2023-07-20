<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\Admin\TestimonialService;

class TestimonialController extends Controller
{
    protected $service;

    public function __construct(TestimonialService $service)
    {
        $this->service = $service;
        view()->share("folder", $this->service->folder());
        view()->share("route", $this->service->route());
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact("items"));
    }

    public function create()
    {
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StoreTestimonialRequest $request)
    {
        if ($this->service->create((object)$request->validated())) :
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        endif;
    }

    public function edit(Testimonial $testimonial)
    {
        return view("admin.{$this->service->folder()}.edit", compact("testimonial"));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        if ($this->service->update((object)$request->validated(), $testimonial)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        endif;
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($this->service->delete($testimonial)) :
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log"));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
