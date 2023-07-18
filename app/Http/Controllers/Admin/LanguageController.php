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
    protected $route;
    protected $folder;

    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
        $this->route = ModuleEnum::Language->route();
        $this->folder = ModuleEnum::Language->folder();
        view()->share('route', $this->route);
        view()->share('folder', $this->folder);
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

    public function store(StoreLanguageRequest $request)
    {
        if ($this->service->create($request))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.create_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.create_error"));
    }

    public function edit(Language $language)
    {
        return view("admin.{$this->folder}.edit", compact('language'));
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
        return view("admin.{$this->folder}.files", compact("files", "adminFiles"));
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        if ($this->service->update($request, $language))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.update_success"));
        return back()
            ->withInput()
            ->withError(__("admin/{$this->folder}.update_error"));
    }

    public function destroy(Language $language)
    {
        if ($this->service->delete($language))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
