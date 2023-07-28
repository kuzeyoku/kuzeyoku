<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title." . app()->getLocale() => "required",
            "title.*" => "nullable",
            "description.*" => "nullable",
            "features.*" => "nullable",
            "start_date" => "nullable",
            "end_date" => "nullable",
            "video" => "nullable|active_url",
            "3d" => "nullable",
            "status" => "required",
            "category_id" => "nullable|numeric",
            "image" => "image|mimes:png,jpeg,jpg,gif|max:" . config("setting.image.max_size", 4096),
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getLocale() => __("admin/project.form.title"),
            "title.*" => __("admin/project.form.title"),
            "description.*" => __("admin/project.form.description"),
            "features.*" => __("admin/project.form.features"),
            "start_date" => __("admin/project.form.start_date"),
            "end_date" => __("admin/project.form.end_date"),
            "video" => __("admin/project.form.video"),
            "3d" => __("admin/project.form.3d"),
            "status" => __("admin/project.form.status"),
            "category_id" => __("admin/project.form.category"),
            "image" => __("admin/project.form.image"),
        ];
    }
}
