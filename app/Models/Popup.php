<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PopupTranslate;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        "type", "image", "video", "url", "time", "width", "closeOnEscape", "closeButton", "overlayClose", "pauseOnHover", "fullScreenButton", "color", "status"
    ];

    public function translate()
    {
        return $this->hasMany(PopupTranslate::class);
    }

    public function getTitleAttribute()
    {
        return $this->translate->pluck("title", "lang")->toArray();
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->pluck("description", "lang")->toArray();
    }
}
