<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title." . app()->getLoacale() => "required",
            "title.*" => "",
            "url" => "nullable|url",
            "type" => "required|in:header,footer",
            "parent_id" => "required|numeric",
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
            "parent_id" => __("admin/{$this->folder}.form.parent_id"),
            "order" => __("admin/general.form.order"),
        ];
    }
}
