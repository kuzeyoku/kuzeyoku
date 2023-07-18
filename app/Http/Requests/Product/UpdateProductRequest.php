<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ModuleEnum;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Product->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "",
            "content.*" => "",
            "features.*" => "",
            "price" => "",
            "currency" => "",
            "status" => "required",
            "category_id" => "",
            "image" => "image|mimes:png,jpeg,jpg,gif|max:" . config("setting.image.max_size", 4096),
            "imageDelete" => "",
            "video" => "nullable|active_url"
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/{$this->folder}.form.title"),
            "content.*" => __("admin/{$this->folder}.form.content"),
            "features.*" => __("admin/{$this->folder}.form.features"),
            "price" => __("admin/{$this->folder}.form.price"),
            "currency" => __("admin/{$this->folder}.form.currency"),
            "status" => __("admin/{$this->folder}.form.status"),
            "category_id" => __("admin/{$this->folder}.form.category"),
            "image" => __("admin/{$this->folder}.form.image"),
            "video" => __("admin/{$this->folder}.form.video")
        ];
    }
}
