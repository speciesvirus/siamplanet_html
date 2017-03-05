<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductProductArea extends Model
{
    protected $table = 'product_product_area';
    public $timestamps = false;

    public static function selectOnProduct($product)
    {
        return ProductProductArea::leftJoin('product_areas', 'product_areas.id', '=', 'product_product_area.product_area_id')
            ->select(
                'product_product_area.id', 'product_areas.id as area_id', 'product_product_area.area',
                'product_product_area.lat', 'product_product_area.lng', 'product_product_area.distance'
            )->where('product_product_area.product_id', $product)->get();
    }
}
