<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductArea extends Model
{
    public static function ddl()
    {
        return ProductArea::where('active', 'A')->orderBy('sort')->pluck('area', 'id');
    }
}
