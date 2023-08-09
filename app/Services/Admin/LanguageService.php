<?php

namespace App\Services\Admin;

use App\Models\Language;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class LanguageService extends BaseService
{
    protected $language;

    public function __construct(Language $language)
    {
        parent::__construct($language, ModuleEnum::Language);
    }

    public function create(Object $request)
    {
        $data = new Request([
            'title' => $request->title,
            'code' => $request->code,
            'status' => $request->status,
        ]);
        return parent::create($data);
    }

    public function update(Object $request, Model $language)
    {
        $data = new Request([
            'title' => $request->title,
            'code' => $request->code,
            'status' => $request->status,
        ]);
        return parent::update($data, $language);
    }

    static function toArray()
    {
        return cache()->rememberForever('languages', function () {
            return Language::where('status', StatusEnum::Active->value)->get();
        });
    }
}
