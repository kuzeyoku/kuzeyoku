<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostEditorRequest;
use App\Services\Admin\ImageService;

class EditorController extends Controller
{
    public function upload(PostEditorRequest $request)
    {
        if ($request->hasFile("file")) {
            return ImageService::editorUpload($request->file("file"));
        }
    }
}
