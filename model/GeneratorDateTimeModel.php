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
    function getDates($start, $end,$formato="Y-m-d") {
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
    public function getTimes($inicio = '2015-03-02 20:02:03', $final = '2015-03-02 20:04:03',$cant=200) {
        $t1 = strtotime($inicio);
        $t2 = strtotime($final);
        $retorno=array();
        $ind=0;
        $cont=0;
        while ($cont<$cant) {
            if ($t1 >= $t2) {
                $t1=  strtotime($inicio);
            }
            $retorno[$ind]=date('H:i:s', $t1);
            $t1 = strtotime('+1 second', $t1);
            $ind=$ind+1;
            $cont=$cont+1;
        }
        return $retorno;
    }
    public function getDateTimes($inicio = '2015-03-02 20:02:03', $final = '2015-03-02 20:04:03',$cant=200) {
        $t1 = strtotime($inicio);
        $t2 = strtotime($final);
        $retorno=array();
        $ind=0;
        $cont=0;
        while ($cont<$cant) {
            if ($t1 >= $t2) {
                $t1=  strtotime($inicio);
            }
            $retorno[$ind]=date('Y-m-d H:i:s', $t1);
            $t1 = strtotime('+1 second', $t1);
            $ind=$ind+1;
            $cont=$cont+1;
        }
        return $retorno;
    }
}














