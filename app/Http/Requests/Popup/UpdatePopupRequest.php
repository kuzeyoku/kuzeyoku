<?php

namespace App\Http\Requests\Popup;

use App\Enums\ModuleEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePopupRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Popup->folder();
    }

    public function rules(): array
    {
        return [
            "type" => "required",
            "time" => "numeric|nullable",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:" . config("setting.image.max_size", 4096),
            "url" => "nullable|active_url",
            "video" => "nullable|active_url",
            "title.*" => "nullable",
            "message.*" => "nullable",
            "status" => "required",
            "imageDelete" => "",
        ];
    }

    public function attributes(): array
    {
        return [
            "type" => __("admin/{$this->folder}.form.type"),
            "image" => __("admin/{$this->folder}.form.image"),
            "url" => __("admin/{$this->folder}.form.url"),
            "video" => __("admin/{$this->folder}.form.video"),
            "title.*" => __("admin/{$this->folder}.form.title"),
            "message.*" => __("admin/{$this->folder}.form.message"),
            "status" => __("admin.general.status"),
        ];
    }
}
