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
    ];

    public $timestamps = false;

    public static function toSelectArray($type)
    {
        return array_map(function ($item) {
            return [
                "id" => $item->id,
                "title" => $item->title,
            ];
        }, Menu::whereType($type)->get()->toArray());
    }
}
