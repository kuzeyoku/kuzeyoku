<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'status',
    ];

    public function translate()
    {
        return $this->hasMany(PageTranslate::class);
    }

    public function getTitleAttribute()
    {
        return $this->translate()->pluck("title", "lang")->toArray();
    }

    public function getContentAttribute()
    {
        return $this->translate()->pluck("content", "lang")->toArray();
    }

    public function getTitle()
    {
        return $this->getTitleAttribute()[app()->getLocale()];
    }

    public function getContent()
    {
        return $this->getContentAttribute()[app()->getLocale()];
    }

    public static function toSelectArray()
    {
        return Cache::remember('page_list', config("setting.cache.time", 3600), function () {
            return self::where("status", StatusEnum::Active->value)->get()->mapWithKeys(function ($item) {
                return [$item->id => $item->title[app()->getLocale()]];
            })->toArray();
        });
    }
}
