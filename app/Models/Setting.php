<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SettingCategoryEnum;

class Setting extends Model
{
    use HasFactory;

    public $table = "settings";
    public $timestamps = false;
    protected $fillable = ["key","value","category"];

    
}
