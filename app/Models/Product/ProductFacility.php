<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductFacility extends Model
{
    public static function ddl()
    {
        return ProductFacility::where('active', 'A')->orderBy('sort')->pluck('facility', 'id');
    }
}
