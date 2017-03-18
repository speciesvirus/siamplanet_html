<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    public $timestamps = false;

    public function image() {
        return $this->hasOne('App\Models\Product\ProductReviewImage');
    }

    public static function selectOnProduct($product)
    {
        return ProductReview::leftJoin('product_units', 'product_units.id', '=', 'product_reviews.product_unit_id')
            ->select(
                'product_reviews.id', 'product_reviews.name', 'product_reviews.unit',
                'product_reviews.price', 'product_reviews.content', 'product_units.unit as unit_type'
            )->where('product_reviews.product_id', $product)->get();
    }
}
