<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Language;
use Illuminate\Support\Facades\Lang;
use App\Services\Admin\LanguageService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;

class LanguageController extends Controller
{
    protected $service;

    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
        view()->share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
        ]);
    }

    public function index()
    {
        $this->authorize("viewAny", Language::class);
        $items = $this->service->all();
        return view("admin.{$this->service->folder()}.index", compact('items'));
    }

    public function create()
    {
        $this->authorize("viewAny", Language::class);
        return view("admin.{$this->service->folder()}.create");
    }

    public function store(StoreLanguageRequest $request)
    {
        $this->authorize("store", Language::class);
        try {
            $this->service->create((object)$request->validated());
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title]));
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

    public function edit(Language $language)
    {
        $this->authorize("viewAny", Language::class);
        return view("admin.{$this->service->folder()}.edit", compact('language'));
    }

    public function files(Language $language)
    {
        $this->authorize("fileProcess", Language::class);
        $fileContent = [];
        $_filename = null;
        $_folder = null;
        if (request()->method() == "POST") {
            $_folder = request()->_folder == "admin" ? "admin" : null;
            $_filename = request()->_filename;
            Lang::setLocale($language->code);
            $fileContent = Lang::get($_folder . "/" . $_filename);
        }
        $lang = Storage::disk("lang");
        $files = array_reduce($lang->files($language->code), function ($carry, $file) {
            $files = explode("/", $file);
            $file = end($files);
            $fileName = basename($file, ".php");
            $carry[$fileName] = ucfirst($fileName);
            return $carry;
        });
        $adminFiles = array_reduce($lang->files($language->code . "/admin"), function ($carry, $file) {
            $files = explode("/", $file);
            $file = end($files);
            $fileName = basename($file, ".php");
            $carry[$fileName] = ucfirst($fileName);
            return $carry;
        });
        return view("admin.{$this->service->folder()}.files", compact("files", "adminFiles", "language", "fileContent", "_filename", "_folder"));
    }

    public function updateFileContent(Language $language)
    {
        $this->authorize("fileProcess", Language::class);
        $folder = request()->_folder == "admin" ? "admin" : null;
        $filename = request()->_filename;
        $content = request()->except("_token", "_method", "_filename", "_folder");
        $path = "{$language->code}/{$folder}/{$filename}.php";
        $stringContent = "<?php\nreturn [\n";
        foreach ($content as $key => $value) {
            $stringContent = $stringContent . "'{$key}' => '{$value}',\n";
        }
        $stringContent = $stringContent . "];";
        Storage::disk("lang")->put($path, $stringContent);
        return back()->withSuccess(__("admin/{$this->service->folder()}.update_success"));
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $this->authorize("update", Language::class);
        try {
            $this->service->update((object)$request->validated(), $language);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->title]));
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

    public function destroy(Language $language)
    {
        $this->authorize("destroy", Language::class);
        try {
            $this->service->delete($language);
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $language->title]));
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
