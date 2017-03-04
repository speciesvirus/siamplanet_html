<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductProductFacility extends Model
{
    protected $table = 'product_product_facility';
    public $timestamps = false;

    public static function selectOnProduct($product)
    {
        return ProductProductFacility::leftJoin('product_facilities', 'product_facilities.id', '=', 'product_product_facility.product_facility_id')
            ->select(
                'product_product_facility.id', 'product_facilities.facility',
                'product_product_facility.image'
            )->where('product_product_facility.product_id', $product)->get();
    }
}
