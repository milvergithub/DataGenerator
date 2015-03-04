<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 28-01-15
 * Time: 04:00 PM
 */

class GeneratorNetworkAddresModel {
    public function __construct(){

    }
    public static function numberBetween($min = 0, $max = 2147483647){
        return mt_rand($min, $max);
    }
    public function ipv6($cantidad){
        $retorno=array();
        $cont=0;
        while($cont<$cantidad){
            $res = array();
            for ($i=0; $i < 8; $i++) {
                $res []= dechex(mt_rand(0, "65535"));
            }

            $retorno[$cont]= join(':', $res);
            $cont=$cont+1;
        }
        return $retorno;
    }
    /**
     * @ejemplo '10.1.1.17'
     */
    public static function localIpv4($cantidad){
        $retorno=array();
        $cont=0;
        while($cont<$cantidad) {
            if (GeneratorNetworkAddresModel::numberBetween(0, 1) === 0) {
                // 10.x.x.x range
                $ip = long2ip(GeneratorNetworkAddresModel::numberBetween(167772160, 184549375));
            } else {
                // 192.168.x.x range
                $ip = long2ip(GeneratorNetworkAddresModel::numberBetween(3232235520, 3232301055));
            }

            $retorno[$cont]=$ip;
            $cont=$cont+1;
        }
        return $retorno;
    }

    /**
     * @example '32:F1:39:2F:D6:18'
     */
    public static function macAddress($cantidad){
        $retorno=array();
        $cont=0;
        while($cont<$cantidad) {
            for ($i=0; $i<6; $i++) {
                $mac[] = sprintf('%02X', GeneratorNetworkAddresModel::numberBetween(0, 0xff));
            }
            $retorno[$cont] = implode(':', $mac);
            $cont=$cont+1;
        }
        return $retorno;
    }
    function getDirecionesIPv4($ini/*192.168.100.011*/,$fin/*192.168.100.110*/,$cantidad) {
        $inicio=  explode('.', $ini);
        $final= $fin;
        $cont=0;
        $resultados=array();
        while ($cont<$cantidad) {
            if (implode(".", $inicio)==$fin) {
                $inicio=  explode('.', $ini);
            }
            $inicio=  $this->getInicio($inicio);
            $resultados[$cont]=implode(".",$inicio);
            $cont=$cont+1;
        }
        return $resultados;
    }
    function getInicio($datos) {
        if ($datos[3]==253) {
            $datos[3]=0;
            $datos[2]=$datos[2]+1;
        }
        if ($datos[2]==253){
            $datos[2]=1;
            $datos[1]=$datos[1]+1;
        }
        if ($datos[1]==253){
            $datos[1]=1;
            $datos[0]=$datos[0]+1;
        }
        $datos[3]=$datos[3]+1;
        return $datos;
    }
}