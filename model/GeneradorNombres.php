<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19-01-15
 * Time: 10:46 AM
 */

class GeneradorNombres {

    private function __construct() {

    }
    function palabras($min = 4, $max = 8) {
        $vocales = array('a', 'e', 'i', 'o', 'u');
        $consonantes = array('b', 'c', 'd', 'f', 'g', 'j', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y');
        $tamano = intval(rand($min, $max));
        $actual = intval(rand(1, 2));
        $nombre = '';
        for ($x = 0; $x < $tamano; $x++) {
            if ($actual == 0) {
                $actual = 1;
                $pos = rand(0, count($vocales) - 1);
                $nombre .= $vocales[$pos];
            } else {
                $actual = 0;
                $pos = rand(0, count($consonantes) - 1);
                $nombre .= $consonantes[$pos];
            }
        }
        return ucfirst($nombre);
    }
    function nombresLatinos($min = 4, $max = 8){
        $vocales = array('a', 'e', 'i', 'o', 'u','á','é','í','ó','ú');
        $consonantes = array('b', 'c', 'd', 'f', 'g', 'j', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y');
        $tamano = intval(rand($min, $max));
        $actual = intval(rand(1, 2));
        $acentoUsado=false;
        $vocalesUsados=0;
        $consonantesUsados=0;
        $nombre = '';
        if($actual==1){
            $pos=rand(0,count($consonantes)-1);
            $nombre .=$consonantes[$pos];
            $consonantesUsados=$consonantesUsados+1;
        }else{
            $pos = rand(0, (count($vocales)/2) - 1);
            $nombre .= $vocales[$pos];
            $vocalesUsados=$vocalesUsados+2;
        }
        for ($x = 1; $x < $tamano; $x++) {
            if($vocalesUsados<2){
                $turno = intval(rand(1, 2));
                if($turno==1){
                    $pos=rand(0,count($consonantes)-1);
                    $nombre .=$consonantes[$pos];
                    $consonantesUsados=$consonantesUsados+1;
                    if($vocalesUsados>0){
                        $vocalesUsados=0;
                    }
                }else{
                    $pos = rand(0, (count($vocales)/2) - 1);
                    $nombre .= $vocales[$pos];
                    $vocalesUsados=$vocalesUsados+1;
                    if($consonantesUsados>0){
                        $consonantesUsados=0;
                    }
                }
            }else{
                $pos=rand(0,count($consonantes)-1);
                $nombre .=$consonantes[$pos];
                $consonantesUsados=$consonantesUsados+1;
                if($vocalesUsados>0){
                    $vocalesUsados=0;
                }
            }
        }
        return ucfirst($nombre);

    }
} 