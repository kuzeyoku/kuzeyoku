<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\PageTranslate;
use Illuminate\Database\Eloquent\Model;

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
        return self::where("status", StatusEnum::Active->value)->get()->mapWithKeys(function ($item) {
            return [$item->id => $item->title[app()->getLocale()]];
        })->toArray();
    }
}
