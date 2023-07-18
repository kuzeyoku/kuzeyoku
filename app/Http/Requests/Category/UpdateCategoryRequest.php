<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\ModuleEnum;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Category->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "",
            "description.*" => "",
            "module" => [new Enum(ModuleEnum::class)],
            "parent" => "numeric",
            "status" => "required",
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/{$this->folder}.form.title"),
            "description.*" => __("admin/{$this->folder}.form.description"),
            "module" => __("admin/{$this->folder}.form.module"),
            "parent" => __("admin/{$this->folder}.form.parent"),
            "status" => __("admin/general.status")
        ];
    }
}
