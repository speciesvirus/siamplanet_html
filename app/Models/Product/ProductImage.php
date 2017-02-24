<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product\Product');
    }
}
