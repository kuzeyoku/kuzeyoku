<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ModuleEnum;

class UpdateSliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Slider->folder();
    }

    public function rules(): array
    {
        return [
            "title.*" => "",
            "description.*" => "",
            "status" => "",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:" . config("setting.image.max_size", 4096),
            "button_url" => "",
            "title_size" => "",
            "description_size" => "",
            "imageDelete" => "",
        ];
    }

    public function attributes(): array
    {
        return [
            "title.*" => __("admin/{$this->folder}.form.title"),
            "description.*" => __("admin/{$this->folder}.form.description"),
            "image" => __("admin/{$this->folder}.form.image"),
            "button_url" => __("admin/{$this->folder}.form.button_url"),
            "title_size" => __("admin/{$this->folder}.form.title_size"),
            "description_size" => __("admin/{$this->folder}.form.description_size"),
            "status" => __("admin/general.status")
        ];
    }
}
