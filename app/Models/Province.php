<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    public function geography() {
        return $this->belongsTo('App\Models\Geography');
    }

    public static function ddl()
    {
        return Province::pluck('name', 'en');
    }
}
