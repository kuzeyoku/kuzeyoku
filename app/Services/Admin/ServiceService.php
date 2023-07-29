<?php

namespace App\Services\Admin;

use App\Models\Service;
use App\Models\ServiceTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ServiceService extends BaseService
{
    protected $imageService;
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service, ModuleEnum::Service);
        $this->imageService = new ImageService(ModuleEnum::Service);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[app()->getLocale()]),
            "status" => $request->status,
            "category_id" => $request->category_id,
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

    public function update(Object $request, Model $service)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[app()->getLocale()]),
            "status" => $request->status,
            "category_id" => $request->category_id,
        ]);

        if (isset($request->imageDelete)) {
            parent::imageDelete($service);
        }

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
            if ($data->image && !is_null($service->image)) {
                $this->imageService->delete($service->image);
            }
        }

        $query = parent::update($data, $service);

        if ($query) {
            $this->translations($service->id, $request);
        }

        return $query;
    }

    public function translations(int $serviceId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->content[$language->code])) {
                ServiceTranslate::updateOrCreate(
                    [
                        "service_id" => $serviceId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "content" => $request->content[$language->code] ?? null
                    ]
                );
            }
        }
    }
}
