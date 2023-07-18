<?php

namespace App\Services\Admin;

use App\Enums\StatusEnum;
use App\Models\Language;

class LanguageService extends BaseService
{
    protected $language;

    public function __construct(Language $language)
    {
        parent::__construct($language);
    }

    static function toArray()
    {
        return cache()->rememberForever('languages', function () {
            return Language::where('status', StatusEnum::Active->value)->get();
        });
    }
}
