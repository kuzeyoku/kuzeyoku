<?php

namespace App\Services\Admin;

use App\Models\Slider;
use App\Models\SliderTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use App\Services\Admin\ImageService;
use Illuminate\Database\Eloquent\Model;

class SliderService extends BaseService
{

    protected $imageService;
    protected $slider;

    public function __construct(Slider $slider)
    {
        parent::__construct($slider, ModuleEnum::Slider);
        $this->imageService = new ImageService(ModuleEnum::Slider);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "button_url" => $request->button_url,
            "title_size" => $request->title_size,
            "description_size" => $request->description_size,
            "status" => $request->status,
        ]);

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
        }

        $slider = parent::create($data);

        if ($slider->id) {
            $this->translations($slider->id, $request);
            return true;
        }

        return false;
    }

    public function update(Object $request, Model $slider)
    {
        $data = new Request([
            "button_url" => $request->button_url,
            "title_size" => $request->title_size,
            "description_size" => $request->description_size,
            "status" => $request->status,
        ]);
        
        if (isset($request->imageDelete)) {
            parent::imgDelete($slider);
        }

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
            if ($data->image && $slider->image !== null) {
                parent::imgDelete($slider);
            }
        }

        $query = parent::update($data, $slider);

        if ($query) {
            $this->translations($slider->id, $request);
            return true;
        }

        return false;
    }

    public function translations(int $sliderId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                SliderTranslate::updateOrCreate(
                    [
                        "slider_id" => $sliderId,
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
