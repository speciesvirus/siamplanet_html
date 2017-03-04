<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

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
}
