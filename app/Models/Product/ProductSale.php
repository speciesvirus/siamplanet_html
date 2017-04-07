<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    public static function ddl()
    {
        return ProductSale::where('active', 'A')->orderBy('sort')->pluck('sale', 'id');
    }
}
