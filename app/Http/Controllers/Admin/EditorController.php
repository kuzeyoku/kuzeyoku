<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostEditorRequest;
use App\Services\Admin\ImageService;

class EditorController extends Controller
{
    // protected $imageService;
    // public function __construct()
    // {
    //     $this->middleware("auth:admin");
    //     $this->imageService = new ImageService();
    // }
    // public function upload(PostEditorRequest $request)
    // {
    //     if ($request->hasFile("file")) {
    //         return ImageService::editorUpload($request->file("file"));
    //     }
    // }
}
