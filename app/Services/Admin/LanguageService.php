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
            return Language::where('status', StatusEnum::Active->value)->get();
        });
    }

    public function files(Language $language): array
    {
        $languageCode = $language->code;
        $_folder = request()->_folder === "admin" ? "admin" : null;
        $_filename = request()->_filename;

        $fileContent = [];
        if (request()->isMethod("POST")) {
            Lang::setLocale($languageCode);
            $fileContent = Lang::get("{$_folder}/{$_filename}");
        }

        $langDisk = Storage::disk("lang");

        $extractFileData = function ($file) {
            $fileName = basename($file, ".php");
            return [strtolower($fileName) => ucfirst($fileName)];
        };

        $initialOption = ['select' => 'Seçiniz'];

        $files = array_reduce($langDisk->files($languageCode), function ($carry, $file) use ($extractFileData, $initialOption) {
            return array_merge($initialOption, $carry, $extractFileData($file));
        }, []);

        $adminFiles = array_reduce($langDisk->files("{$languageCode}/admin"), function ($carry, $file) use ($extractFileData, $initialOption) {
            return array_merge($initialOption, $carry, $extractFileData($file));
        }, []);

        return [
            "files" => $files,
            "adminFiles" => $adminFiles,
            "fileContent" => $fileContent,
            "_filename" => $_filename,
            "_folder" => $_folder,
        ];
    }

    public function updateFileContent(Language $language)
    {
        $folder = request()->_folder == "admin" ? "admin" : null;
        $filename = request()->_filename;
        $content = request()->except("_token", "_method", "_filename", "_folder");
        $path = "{$language->code}/{$folder}/{$filename}.php";
        $stringContent = "<?php\nreturn [\n";
        foreach ($content as $key => $value) {
            $stringContent = $stringContent . "'{$key}' => '{$value}',\n";
        }
        $stringContent = $stringContent . "];";
        return Storage::disk("lang")->put($path, $stringContent);
    }
}
