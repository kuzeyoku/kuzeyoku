<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Education;
use App\Models\EducationTranslate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class EducationService extends BaseService

{
    protected $imageService;
    protected $service;

    public function __construct(Education $education)
    {
        parent::__construct($education, ModuleEnum::Education);
        $this->imageService = new ImageService(ModuleEnum::Education);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[app()->getLocale()]),
            "status" => $request->status,
            "order" => $request->order,
            "video" => $request->video,
            // "category_id" => $request->category_id,
        ]);

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
        }

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Object $request, Model $education)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[app()->getLocale()]),
            "status" => $request->status,
            "order" => $request->order,
            "video" => $request->video,
            // "category_id" => $request->category_id,
        ]);

        if (isset($request->imageDelete)) {
            parent::imageDelete($education);
        }

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
            if ($data->image && !is_null($education->image)) {
                $this->imageService->delete($education->image);
            }
        }

        $query = parent::update($data, $education);

        if ($query) {
            $this->translations($education->id, $request);
        }

        return $query;
    }

    public function translations(int $educationId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                EducationTranslate::updateOrCreate(
                    [
                        "education_id" => $educationId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "description" => $request->description[$language->code] ?? null
                    ]
                );
            }
        }
    }
}
