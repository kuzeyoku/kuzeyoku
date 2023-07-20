<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Language;
use App\Services\Admin\LanguageService;
use App\Enums\ModuleEnum;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    protected $service;

    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
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

    public function store(StoreLanguageRequest $request)
    {
        if ($this->service->create($request)) :
            LogController::logger('info', __("admin/{$this->service->folder()}.create_log", ["title" => $request->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        endif;
    }

    public function edit(Language $language)
    {
        return view("admin.{$this->service->folder()}.edit", compact('language'));
    }

    public function files(Language $language)
    {
        $lang = Storage::disk("lang");
        $files = array_reduce($lang->files($language->code), function ($carry, $file) {
            $files = explode("/", $file);
            $file = end($files);
            $fileName = basename($file, ".php");
            $carry[$file] = ucfirst($fileName);
            return $carry;
        });
        $adminFiles = array_reduce($lang->files($language->code . "/admin"), function ($carry, $file) {
            $files = explode("/", $file);
            $file = end($files);
            $fileName = basename($file, ".php");
            $carry[$file] = ucfirst($fileName);
            return $carry;
        });
        return view("admin.{$this->service->folder()}.files", compact("files", "adminFiles"));
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        if ($this->service->update($request, $language)) :
            LogController::logger('info', __("admin/{$this->service->folder()}.update_log", ["title" => $language->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        else :
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        endif;
    }

    public function destroy(Language $language)
    {
        if ($this->service->delete($language)) :
            LogController::logger('info', __("admin/{$this->service->folder()}.delete_log", ["title" => $language->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        else :
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        endif;
    }
}
