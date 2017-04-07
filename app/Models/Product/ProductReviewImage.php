<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductReviewImage extends Model
{
    public $timestamps = false;

    public static function selectOnProduct($projectId)
    {
        $project = ProductReviewImage::select(
            'product_review_images.id', 'product_review_images.product_review_id', 'product_review_images.image'
        );

        foreach ($projectId as $value){
            $project->orWhere('product_review_images.product_review_id', $value);
        }

        return $project->get();
    }
}
