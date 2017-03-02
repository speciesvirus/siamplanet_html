<?php
/**
 * Created by PhpStorm.
 * User: Plai
 * Date: 3/2/2017
 * Time: 9:29 PM
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ProductComposer
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    public function compose(View $view)
    {
        $view->with('trans_time', function($time) {
            $time = strtotime($time);
            $time = time() - $time; // to get the time since that moment
            $time = ($time<1)? 1 : $time;
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );

            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }

        });
    }

}