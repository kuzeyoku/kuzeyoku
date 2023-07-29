<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use claviska\SimpleImage;
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

    public function delete(string|array $file): bool
    {
        $dir = "public/" . config("setting.image.upload_folder", "image") . "/{$this->module->folder()}";
        if (is_array($file)) {
            array_map(function ($item) use ($dir) {
                if (Storage::fileExists($dir . "/" . $item)) {
                    Storage::delete($dir . "/" . $item);
                }
            }, $file);
            return true;
        }

        if (Storage::fileExists($dir . "/" . $file)) {
            return Storage::delete($dir . "/" . $file);
        }

        return false;
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
