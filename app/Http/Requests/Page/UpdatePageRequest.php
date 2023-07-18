<?php

namespace App\Http\Requests\Page;;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ModuleEnum;

class UpdatePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Page->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "",
            "content.*" => "",
            "status" => "required"
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/{$this->folder}.form.title"),
            "content.*" => __("admin/{$this->folder}.form.content"),
            "status" => __("admin/general.status")
        ];
    }
}
