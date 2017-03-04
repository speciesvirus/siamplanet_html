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
        $view->with([
            'trans_time' => function($time) {
                date_default_timezone_set('Asia/Bangkok');
                $timestamp = strtotime($time);
//            $time = time() - $time; // to get the time since that moment
//            $time = ($time<1)? 1 : $time;
//            $tokens = array (
//                31536000 => 'year',
//                2592000 => 'month',
//                604800 => 'week',
//                86400 => 'day',
//                3600 => 'hour',
//                60 => 'minute',
//                1 => 'second'
//            );
//
//            foreach ($tokens as $unit => $text) {
//                if ($time < $unit) continue;
//                $numberOfUnits = floor($time / $unit);
//                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
//            }

                $diff = time() - (int)$timestamp;

                if ($diff == 0)
                    return 'just now';

                $intervals = array
                (
                    1                   => array('year',    31556926),
                    $diff < 31556926    => array('month',   2628000),
                    $diff < 2629744     => array('week',    604800),
                    $diff < 604800      => array('day',     86400),
                    $diff < 86400       => array('hour',    3600),
                    $diff < 3600        => array('minute',  60),
                    $diff < 60          => array('second',  1)
                );

                $value = floor($diff/$intervals[1][1]);
                return $value.' '.$intervals[1][0].($value > 1 ? 's' : '');//.' ago'

        },
            'cal_unit' => function($price, $unit, $unit_id) {

                $result = 0;

                if($unit_id == 1){
                    $result = $price / $unit;
                }elseif ($unit_id == 2){
                    $result = $price / ($unit * 4);
                }
                return number_format(intval($result));
            }
            ]);
    }

}