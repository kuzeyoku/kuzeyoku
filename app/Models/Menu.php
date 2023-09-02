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

    private $locale;

    public function __construct()
    {
        $this->locale = app()->getLocale();
    }

    public function translate()
    {
        return $this->hasMany(MenuTranslate::class);
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, "parent_id");
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order", "asc");
    }

    public function getTitleAttribute()
    {
        return  $this->translate->pluck("title", "lang")->toArray();
    }

    public function getTitle()
    {
        if (array_key_exists($this->locale, $this->title))
            return $this->title[$this->locale];
        return null;
    }

    public static function toSelectArray($type)
    {
        return Menu::whereType($type)->get()->pluck("title." . app()->getLocale(), "id")->toArray();
    }
}
