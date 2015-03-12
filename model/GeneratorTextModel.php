<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 19-01-15
 * Time: 10:46 AM
 */

class GeneratorTextModel {

    public function __construct() {

    }
    public function getEmails($cantidad) {
        $retorno=array();
        $cont=0;
        while ($cont<$cantidad) {
            $retorno[$cont]=  $this->getGenerarEmail();
            $cont++;
        }
        return $retorno;
    }
    private function getGenerarEmail(){
        $extenciones=array('.com','.org','.co','.cl','eu','.biz','es','.net','.edu','.tv','.info');
        $dominios=array('gmail','outlook','hotmail','otro');
        $posExt=rand(0,count($extenciones)-1);
        $posDomain=rand(0,count($dominios)-1);
        return ($this->getGenerarPalabras()."@".$dominios[$posDomain].$extenciones[$posExt]);
    }
    function getGenerarEmailWhithDomain($dominios) {
        $posDom=rand(0,count($dominios)-1);
        return ($this->getGenerarPalabras()."@".$dominios[$posDom]);
    }
    function getGenerarPalabras($min = 4, $max = 8,$iniMay=true) {
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
        if($iniMay){
            return ucfirst($nombre);
        }else{
            return $nombre;
        }
    }
    function getContenidoLista($texto,$cantidad){
        $lista=array();
        $contenido=explode(',',$texto);
        $cont=0;
        $ind=0;
        $pos=0;
        while($cont<$cantidad){
            if($pos>=sizeof($contenido)){
                $pos=0;
            }
            $lista[$ind]=$contenido[$pos];
            $ind++;$pos++;$cont++;
        }
        return $lista;
    }
}


