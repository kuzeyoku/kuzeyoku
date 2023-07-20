<?php

namespace App\Services\Admin;

use App\Models\Language;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;

class LanguageService extends BaseService
{
    protected $language;

    public function __construct(Language $language)
    {
        parent::__construct($language, ModuleEnum::Language);
    }

    static function toArray()
    {
        return cache()->rememberForever('languages', function () {
            return Language::where('status', StatusEnum::Active->value)->get();
        });
    }
}
