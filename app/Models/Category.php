<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'status',
        'module',
        'parent_id',
        "order"
    ];

    protected $with = ["translate"];

    public function translate()
    {
        return $this->hasMany(CategoryTranslate::class);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::Active->value);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order", "asc");
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

    public static function getCategory(int $id)
    {
        return Cache::remember('category_' . $id, 3600, function () use ($id) {
            return Self::with("translate")->find($id);
        });
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($category) {
            $category->products()->update(["category_id" => 0]);
            $category->services()->update(["category_id" => 0]);
            $category->blogs()->update(["category_id" => 0]);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
