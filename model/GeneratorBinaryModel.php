<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 28-01-15
 * Time: 04:03 PM
 */

class GeneratorBinaryModel {

    public function __construct(){

    }
    public function getDataBinarys($cantidad,$files){
        $valores=array();
        $ind=0;
        for($i=0;$i<$cantidad;$i++){
            if($ind>=sizeof($files)){
                $ind=0;
            }
            $valores[$i]=$files[$ind];
            $ind++;
        }
        return $valores;
    }
}