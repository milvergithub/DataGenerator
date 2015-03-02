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
    function getGenerateDateTime($start/* Y-m-d-H-i-s */, $end/* Y-m-d-H-i-s */, $cant, $formato = "Y-m-d H:m:s"){
        $retornoDateTime = array();
        $inicios = explode('-', $start);
        $finales = explode('-', $end);
        $inicio = new DateTime();
        $inicio->setDate($inicios[0], $inicios[1], $inicios[2]);
        $inicio->setTime($inicios[3], $inicios[4], $inicios[5]);
        $final = new DateTime();
        $final->setDate($finales[0], $finales[1], $finales[2]);
        $final->setTime($finales[3], $finales[4], $finales[5]);
        $cantidad = $cant;
        $indice = 0;
        $cont = 0;
        $inc = 0;
        while ($cont < $cantidad) {
            if ($inicio >= $final) {
                $inicio->setDate($inicios[0], $inicios[1], $inicios[2]);
                $inicio->setTime($inicios[3], $inicios[4], $inicios[5]);
            }
            $inicio->setTime($inicios[3], $inicios[4], $inicios[5] + $inc);
            $retornoDateTime[$indice] = $inicio->format($formato);
            $cont = $cont + 1;
            $indice = $indice + 1;
            $inc=$inc+1;
        }
        return $retornoDateTime;
    }
    function getGenerateTime($start/* Y-m-d-H-i-s */, $end/* Y-m-d-H-i-s */, $cant, $formato = "H:m:s") {
        $retorno = array();
        $inicios = explode('-', $start);
        $finales = explode('-', $end);
        $inicio = new DateTime();
        $inicio->setDate($inicios[0], $inicios[1], $inicios[2]);
        $inicio->setTime($inicios[3], $inicios[4], $inicios[5]);
        $final = new DateTime();
        $final->setDate($finales[0], $finales[1], $finales[2]);
        $final->setTime($finales[3], $finales[4], $finales[5]);
        $cantidad = $cant;
        $indice = 0;
        $cont = 0;
        $inc = 0;
        while ($cont < $cantidad) {
            if ($inicio >= $final) {
                $inicio->setDate($inicios[0], $inicios[1], $inicios[2]);
                $inicio->setTime($inicios[3], $inicios[4], $inicios[5]);
            }
            $inicio->setTime($inicios[3], $inicios[4], $inicios[5] + $inc);
            $retorno[$indice] = $inicio->format($formato);
            $cont = $cont + 1;
            $indice = $indice + 1;
            $inc=$inc+1;
        }
        return $retorno;
    }
}














