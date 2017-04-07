<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
    public static function ddl()
    {
        return ProductUnit::where('active', 'A')->orderBy('sort')->pluck('unit', 'id');
    }
}
