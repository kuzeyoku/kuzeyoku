<?php

namespace App\Services\Admin;

use App\Models\Language;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LanguageService extends BaseService
{
    protected $language;

    public function __construct(Language $language)
    {
        parent::__construct($language, ModuleEnum::Language);
    }

    public function create(Object $request)
    {
        $data = new Request([
            'title' => $request->title,
            'code' => $request->code,
            'status' => $request->status,
        ]);
        return parent::create($data);
    }

    public function update(Object $request, Model $language)
    {
        $data = new Request([
            'title' => $request->title,
            'code' => $request->code,
            'status' => $request->status,
        ]);
        return parent::update($data, $language);
    }

    static function toArray()
    {
        return cache()->rememberForever('languages', function () {
            return Language::active()->get();
        });
    }

    public function files(Language $language)
    {
        $langDisk = Storage::disk("lang");

        $extractFileData = function ($file) {
            return [strtolower(basename($file, ".php")) => ucfirst(basename($file, ".php"))];
        };

        $getFiles = function ($folder) use ($langDisk, $extractFileData, $language) {
            return array_reduce($langDisk->files("{$language->code}/{$folder}"), function ($carry, $file) use ($extractFileData) {
                return array_merge($carry, $extractFileData($file));
            }, []);
        };

        $frontFiles = $getFiles("front");
        $adminFiles = $getFiles("admin");

        if (request()->isMethod("POST")) {
            $filename = request("filename");
            $folder = request("folder");
            $fileContent = [];
            if (Lang::has($folder . "/" . $filename)) {
                $fileContent = Lang::get($folder . "/" . $filename);
            }
            return compact('frontFiles', 'adminFiles', 'fileContent', 'filename', 'folder');
        }

        return compact('frontFiles', 'adminFiles');
    }

    public function updateFileContent(Language $language)
    {
        $folder = request()->_folder;
        $filename = request()->_filename;
        $request = request()->except("_token", "_method", "_filename", "_folder");
        $content = "<?php\nreturn [\n" . implode(",\n", array_map(function ($key, $value) {
            return "'{$key}' => '{$value}'";
        }, array_keys($request), $request)) . "\n];";

        return Storage::disk("lang")->put($language->code . "/" . $folder . "/" . $filename . ".php", $content);
    }
}
