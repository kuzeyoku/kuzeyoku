<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PopupTranslate;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        "type", "image", "video", "url", "time", "status"
    ];

    protected $with = ["translate"];

    public function translate()
    {
        return $this->hasMany(PopupTranslate::class);
    }

    public function getTitleAttribute()
    {
        return $this->translate->groupBy("lang")->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck("title")->first()];
        })->toArray();
    }

    public function getMessageAttribute()
    {
        return $this->translate->groupBy('lang')->mapWithKeys(function ($item, $key) {
            return [$key => $item->pluck('message')->first()];
        })->toArray();
    }
}
