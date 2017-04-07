<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public static function ddl()
    {
        return NewsCategory::where('active', 'A')->orderBy('sort')->pluck('category', 'id');
    }
}
