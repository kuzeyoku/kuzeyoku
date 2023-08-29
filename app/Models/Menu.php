<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "url",
        "type",
        "parent_id",
        "order",
        "blank",
    ];

    public $timestamps = false;

    protected $with = ["translate", "subMenu"];

    public function scopeOrder($query)
    {
        return $query->orderBy("order");
    }

    public function translate()
    {
        return $this->hasMany(MenuTranslate::class);
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, "parent_id");
    }

    public function getTitleAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('title')->first()];
        })->toArray();
    }

    public function getTitle()
    {
        if (array_key_exists(app()->getLocale(), $this->title)) {
            return $this->title[app()->getLocale()];
        }
        return null;
    }

    public static function toSelectArray($type)
    {
        return self::whereType($type)->get()->mapWithKeys(function ($item) {
            return [$item->id => $item->title[app()->getLocale()]];
        })->toArray();
    }
}
