<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 28-01-15
 * Time: 04:02 PM
 */

class GeneratorNumericsModel {
    public function __construct() {
        
    }
    public function getNumerosEnteros($minimo,$maximo,$cantidad,$aleatorio=false) {
        $numeros=array();
        if ($aleatorio) {
            for ($i = 0; $i < $cantidad; $i++) {
                $numeros[]= intval(rand($minimo, $maximo));
            }
        }else{
            $contador=0;
            $inicio=$minimo;
            while ($contador<$cantidad) {
                $numeros[]=$inicio;
                $inicio=$inicio+1;
                if ($inicio>=$maximo) {
                    $inicio=$minimo;
                }
                $contador++;
            }
        }
        return $numeros;
    }
    public function getNumerosDecimales($minimo,$maximo,$cantidad,$aleatorio=false) {
        $numeros=array();
        if ($aleatorio) {
            for ($i = 0; $i < $cantidad; $i++) {
                $numeros[]= intval(rand($minimo, $maximo))+ (intval(rand(0, 10))/10);
            }
        }else{
            $contador=0;
            $inicio=$minimo;
            $decimal=1;
            while ($contador<$cantidad) {
                $numeros[]=$inicio+$decimal/10;
                $decimal++;
                if ($inicio>=$maximo) {
                    $inicio=$minimo;
                }
                if ($decimal>=10) {
                    $decimal=1;
                    $inicio=$inicio+1;
                }
                $contador++;
            }
        }
        return $numeros;
    }
}