<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\Package;

class Universal {

//    //Get Discount
//    public static function get_absent_days($month) {
//        $start = date('Y-m-') . '01';
//        $end = date('Y-m-') . date('t');
//
//        $lastpresent = new \DateTime($end);
//        $todaypresent = new \DateTime($start);
//        $inter_val = new \DateInterval('P1D');
//        return $period = new \DatePeriod($lastpresent, $inter_val, $todaypresent);
//        $totaldays = 0;
//        foreach ($period as $day) {
//            echo $getday = date('D', strtotime($day->format('Y-m-d')));
////            $totaldays += count((array) $getday);
//        }
////        return $totaldays;
//    }

    public static function get_days_order($days) {
        $data = [
            1 => 'Saturday',
            2 => 'Sunday',
            3 => 'Monday',
            4 => 'Tuesday',
            5 => 'Wednesday',
            6 => 'Thursday',
            7 => 'Friday',
        ];
        return $panel = array_search($days, $data);
    }

}
