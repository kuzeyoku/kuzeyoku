<?php

namespace App\Models;

use App\Models\ProductTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "status",
        "slug",
        "category_id",
        "image",
        "video",
        "price",
        "currency",
    ];

    protected $with = ["translate", "images"];

    public function translate()
    {
        return $this->hasMany(ProductTranslate::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
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

    public function getAllPriceAttribute()
    {
        return $this->price . " " . $this->currency;
    }
}
