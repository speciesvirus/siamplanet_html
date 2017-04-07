<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Models\Product\Product');
    }
    public static function selectOnProduct($product)
    {
        return ProductImage::where('product_id', $product)->get();
    }

}
