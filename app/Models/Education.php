<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        "slug",
        "image",
        "video",
        "order",
        "status"
    ];

    protected $locale;

    protected $with = ["translate"];

    public function __construct()
    {
        parent::__construct();
        $this->locale = session()->get("locale");
    }

    public function translate()
    {
        return $this->hasMany(EducationTranslate::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

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
        return $this->translate->pluck("title", "lang")->toArray();
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->pluck("description", "lang")->toArray();
    }

    public function getTitle()
    {
        if (array_key_exists($this->locale, $this->title))
            return $this->title[$this->locale];
        return null;
    }

    public function getDescription()
    {
        if (array_key_exists($this->locale, $this->description))
            return $this->description[$this->locale];
        return null;
    }

    public function getUrl()
    {
        return route(ModuleEnum::Education->route() . ".show", [$this, $this->slug]);
    }

    public function getImageUrl()
    {
        if ($this->image)
            return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Education->folder() . "/" . $this->image);
        return asset("assets/img/noimage.png");
    }

    public static function getOther(int $id, int $limit)
    {
        return Service::active()->where("id", "!=", $id)->limit($limit)->get();
    }
}
