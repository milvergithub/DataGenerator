<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 28-01-15
 * Time: 03:58 PM
 */

class GeneratorDateTimeModel {
    public function __construct(){

    }
    function fechas($start, $end,$formato="Y-m-d") {
        $range = array();
        if (is_string($start) === true)
            $start = strtotime($start);
        if (is_string($end) === true)
            $end = strtotime($end);
        if ($start > $end)
            return createDateRangeArray($end, $start);
        do {
            $range[] = date($formato, $start);
            $start = strtotime("+ 1 day", $start);
        } while ($start <= $end);
        return $range;
    }
    /*
     * $selectedTime = "9:15:00";
       $endTime = strtotime("+60 seconds", strtotime($selectedTime));
       echo date('h:i:s', $endTime);
     * */
    function getGenerateTime($start,$end,$formato="H:m:s"){
        $horas=array();
        if (is_string($start) === true)
            $start = strtotime($start);
        if (is_string($end) === true)
            $end = strtotime($end);
        if ($start > $end)
            return createDateRangeArray($end, $start);
        do {
            $horas[] = date($formato, $start);
            $start = strtotime("+1 seconds", $start);
        } while ($start <= $end);
        return $horas;
    }
}














