<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'status',
        'category_id',
        'user_id',
        "image",
        "order"
    ];

    private $locale;

    public function __construct()
    {
        $this->locale = app()->getLocale();
    }

    public function translate()
    {
        return $this->hasMany(BlogTranslate::class, 'post_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::Active->value);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order", "asc");
    }

    public function scopeViewOrder($query)
    {
        return $query->orderBy("view_count", "desc");
    }

    public function getTitleAttribute()
    {
        return $this->translate->pluck('title', "lang")->toArray();
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->pluck('description', "lang")->toArray();
    }

    public function getTagsAttribute()
    {
        return $this->translate->pluck('tags', "lang")->first();
    }

    public function getTitle()
    {
        return $this->getTitleAttribute()[$this->locale];
    }

    public function getDescription()
    {
        return $this->getDescriptionAttribute()[$this->locale];
    }

    public function getTags()
    {
        $tags = $this->getTagsAttribute()[$this->locale];
        if (!empty($tags))
            return explode(",", $tags);
        return [];
    }

    public function getUrl()
    {
        return route(ModuleEnum::Blog->route() . ".show", [$this->id, $this->slug]);
    }

    public function getImageUrl()
    {
        return asset("storage/" . config("setting.image.folder", "image") . "/" . ModuleEnum::Blog->folder() . "/" . $this->image);
    }
}
