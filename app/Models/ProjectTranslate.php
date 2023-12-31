<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslate extends Model
{
    use HasFactory;

    protected $fillable = [
        "project_id",
        "lang",
        "title",
        "description",
        "features",
    ];

    public $timestamps = false;
}
