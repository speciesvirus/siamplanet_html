<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public static function ddl()
    {
        return ProductType::where('active', 'A')->orderBy('sort')->pluck('type', 'id');
    }
}
