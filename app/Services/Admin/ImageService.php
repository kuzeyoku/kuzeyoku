<?php

namespace App\Services\Admin;

use abeautifulsite\SimpleImage;
use App\Enums\ModuleEnum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    protected $module;
    protected $imageManager;

    public function __construct(ModuleEnum $module)
    {
        $this->imageManager = new SimpleImage();
        $this->module = $module;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = uniqid() . "." . $file->getClientOriginalExtension();
        $uploadFolder = config("setting.image.upload_folder", "image");
        $path =  "public/" . $uploadFolder . "/" . $this->module->folder();
        Storage::makeDirectory($path, 0755, true);
        ['width' => $width, 'height' => $height] = $this->module->image();
        $this->imageManager
            ->fromFile($file->getPathname())
            ->bestFit($width, $height)
            ->toFile($file->getPathname());
        return Storage::putFileAs($path, $file, $fileName) ? $fileName : null;
    }

    public function delete(string $fileName): bool
    {
        $file = "public/" . config("setting.image.upload_folder", "image") . "/{$this->module->folder()}/{$fileName}";
        if (Storage::fileExists($file)) {
            return Storage::delete($file);
        }
        return true;
    }

    public function editorUpload(UploadedFile $file)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $uploadFolder = config("setting.image.upload_folder") ?? "image";
        $path =  "public/" . $uploadFolder . "/editor";
        Storage::makeDirectory($path, 0755, true);
        $this->imageManager
            ->fromFile($file->getPathname())
            ->bestFit(800, 600)
            ->toFile($file->getPathname());
        Storage::putFileAs($path, $file, $fileName);
        return ["location" => asset($path . "/" . $fileName)];
    }
}
