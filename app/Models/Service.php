<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use App\Models\ServiceTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "status",
        "order",
        "slug",
        "category_id",
        "image"
    ];

    protected $with = ["translate"];

    public function translate()
    {
        return $this->hasMany(ServiceTranslate::class);
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryAttribute()
    {
        if ($this->category_id !== 0) {
            $category = Category::getCategory($this->category_id);
            return $category ? $category->title[app()->getLocale()] : null;
        }
    }

    public function getTitle()
    {
        if (array_key_exists(app()->getLocale(), $this->title))
            return $this->title[app()->getLocale()];
        return null;
    }

    public function getDescription()
    {
        if (array_key_exists(app()->getLocale(), $this->description))
            return strip_tags($this->description[app()->getLocale()]);
        return null;
    }

    public function getImageUrl()
    {
        return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Service->folder() . "/" . $this->image);
    }
}
