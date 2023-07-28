<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        "slug",
        "category_id",
        "image",
        "video",
        "3d",
        "start_date",
        "end_date",
        "status"
    ];

    protected $with = ["translate", "images"];

    public function translate()
    {
        return $this->hasMany(ProjectTranslate::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
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

    public function getFeaturesAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('features')->first()];
        })->toArray();
    }

    public function getFeaturesList()
    {
        $featuresLine = explode("\r\n", $this->features[app()->getLocale()]);
        $result = [];

        array_map(function ($item) use (&$result) {
            list($key, $value) = explode("|", $item);
            $result[$key] = $value;
        }, $featuresLine);
        return $result;
    }

    public function getCategoryAttribute()
    {
        if ($this->category_id !== 0) {
            $category = Category::getCategory($this->category_id);
            return $category ? $category->title[app()->getLocale()] : null;
        }
    }
}
