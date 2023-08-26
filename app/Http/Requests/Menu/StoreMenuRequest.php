<?php

namespace App\Http\Requests\Menu;

use App\Enums\ModuleEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Menu->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "",
            "url" => "nullable|url",
            "type" => "required|in:header,footer",
            "parent_id" => "numeric",
            "order" => "required|numeric|min:0",
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/{$this->folder}.form.title"),
            "title.*" => __("admin/{$this->folder}.form.title"),
            "url" => __("admin/{$this->folder}.form.url"),
            "type" => __("admin/{$this->folder}.form.type"),
            "parent_id" => __("admin/{$this->folder}.form.parent"),
            "order" => __("admin/general.order"),
        ];
    }
}
