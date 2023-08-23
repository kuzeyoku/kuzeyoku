<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ModuleEnum;

class UpdateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Blog->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "",
            "description.*" => "",
            "order" => "required|numeric|min:0",
            "status" => "required",
            "category_id" => "",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:" . config("setting.image.max_size", 4096),
            "imageDelete" => ""
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/{$this->folder}.form.title"),
            "description.*" => __("admin/{$this->folder}.form.description"),
            "category_id" => __("admin/{$this->folder}.form.category"),
            "image" => __("admin/{$this->folder}.form.image"),
            "order" => __("admin/general.order"),
            "status" => __("admin/general.status")
        ];
    }
}
