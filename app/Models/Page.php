<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Models\PageTranslate;
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

    protected $with = ["translate"];

    public function translate()
    {
        return $this->hasMany(PageTranslate::class);
    }

    public function getTitleAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('title')->first()];
        })->toArray();
    }

    public function getContentAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('content')->first()];
        })->toArray();
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
