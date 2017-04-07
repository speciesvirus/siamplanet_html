<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public static function first($user) {
        return UserContact::where('user_id', $user)->where('sort', 1)->first();
    }
}
