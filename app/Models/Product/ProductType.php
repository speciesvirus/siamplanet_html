<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public static function ddl()
    {
        return ProductType::where('active', 'A')->orderBy('sort')->pluck('type', 'id');
    }
    public static function ddl_not_id($id)
    {
        return ProductType::where('active', 'A')->where('id', '<>', $id)->orderBy('sort')->pluck('type', 'id');
    }
}
