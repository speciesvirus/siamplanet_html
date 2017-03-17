<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductProject extends Model
{
    public $timestamps = false;

    public function image() {
        return $this->hasOne('App\Models\Product\ProductProjectImage');
    }
}
