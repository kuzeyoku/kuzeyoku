<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        "image", "name", "company", "position", "message", "status", "order"
    ];

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order");
    }

    public function getImageUrl()
    {
        if ($this->image)
            return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Testimonial->folder() . "/" . $this->image);
        return null;
    }
}
