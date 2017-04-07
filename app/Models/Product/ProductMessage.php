<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductMessage extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product\Product');
    }
}
