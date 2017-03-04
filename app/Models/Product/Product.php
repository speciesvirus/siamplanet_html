<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function productType() {
        return $this->belongsTo('App\Models\Product\ProductType');
    }
    public function productSale() {
        return $this->belongsTo('App\Models\Product\ProductSale');
    }
    public function productUnit() {
        return $this->belongsTo('App\Models\Product\ProductUnit');
    }
    public function province() {
        return $this->belongsTo('App\Models\Province');
    }
    public function image() {
        return $this->hasOne('App\Models\Product\ProductImage');
    }
    public function tag() {
        return $this->hasOne('App\Models\Product\ProductTag');
    }
    public function subway() {
        return $this->hasOne('App\Models\Product\ProductSubway');
    }

    public function facility()
    {
        return $this->belongsToMany('App\Models\Product\ProductFacility');
        //return $this->belongsToMany('App\Models\Product\ProductFacility');
    }
    public function assignFacility($facility, $image)
    {
        return $this->facility()->attach($facility, ['image' => $image]);
    }
    public function removeFacility($facility)
    {
        return $this->facility()->detach($facility);
    }

    public function area()
    {
        return $this->belongsToMany('App\Models\Product\ProductArea');
    }
    public function assignArea($area, $name, $lat, $lng)
    {
        return $this->area()->attach($area, ['area' => $name, 'lat' => $lat, 'lng' => $lng]);
    }
    public function removeArea($area)
    {
        return $this->area()->detach($area);
    }


    public static function selectOnProduct($product)
    {
        return Product::join('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->join('product_sales', 'product_sales.id', '=', 'products.product_sale_id')
            ->join('product_units', 'product_units.id', '=', 'products.product_unit_id')
            ->join('provinces', 'provinces.id', '=', 'products.province_id')
            ->select(
                'products.id', 'products.title', 'products.subtitle', 'product_types.type',
                'products.seller', 'products.phone', 'products.view', 'products.project',
                'product_sales.sale', 'product_units.id as unit_id', 'provinces.name as province',
                'products.unit', 'products.complete', 'product_units.unit as unit_name',
                //DB::raw('CONCAT(products.unit, " ", product_units.unit) as unit'),
                'products.price', DB::raw('SUBSTRING(products.content,1,50) as content'), 'products.created_at'
            )->where('products.id', $product)->get();
    }
}
