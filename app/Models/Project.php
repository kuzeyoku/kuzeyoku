<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        "slug",
        "category_id",
        "image",
        "video",
        "model3D",
        "start_date",
        "end_date",
        "order",
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

    public function getTitle()
    {
        if (array_key_exists(app()->getLocale(), $this->title)) {
            return $this->title[app()->getLocale()];
        }
        return null;
    }

    public function getDescription()
    {
        if (array_key_exists(app()->getLocale(), $this->description)) {
            return $this->description[app()->getLocale()];
        }
        return null;
    }

    public function getFeatures()
    {
        if (array_key_exists(app()->getLocale(), $this->features)) {
            return $this->features[app()->getLocale()];
        }
        return null;
    }

    public function getImages()
    {
        return $this->images->map(function ($item) {
            return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Project->folder() . "/" . $item->image);
        });
    }

    public function getImageUrl()
    {
        return $this->image ? asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Project->folder() . "/" . $this->image) : null;
    }
}
