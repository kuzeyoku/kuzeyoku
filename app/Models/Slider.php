<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{

    use HasFactory;

    protected $fillable = [
        "image",
        "button",
        "video",
        "status",
        "order"
    ];

    protected $with = ["translate"];

    public function translate()
    {
        return $this->hasMany(SliderTranslate::class);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::Active->value);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order");
    }

    public function getTitleAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('title')->first()];
        })->toArray();
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('description')->first()];
        })->toArray();
    }

    public function getTitle()
    {
        return $this->title[app()->getLocale()];
    }

    public function getDescription()
    {
        return $this->description[app()->getLocale()];
    }

    public function getImageUrl()
    {
        return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Slider->folder() . "/" . $this->attributes["image"]);
    }
}
