<?php

namespace App\Models;

use App\Models\BlogTranslate;
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
        "image"
    ];

    protected $with = ["translate", "category"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function translate()
    {
        return $this->hasMany(BlogTranslate::class, 'post_id', 'id');
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

    public function getCategoryAttribute()
    {
        if ($this->category_id !== 0) {
            $category = Category::getCategory($this->category_id);
            return $category ? $category->title[app()->getLocale()] : null;
        }
    }


}
