<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductArea extends Model
{
    public static function ddl()
    {
        return ProductArea::where('active', 'A')->orderBy('sort')->pluck('area', DB::raw('CONCAT(id, ",", image) as id'));
    }
}
