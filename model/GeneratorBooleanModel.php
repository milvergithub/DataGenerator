<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 11-03-15
 * Time: 03:23 PM
 */

class GeneratorBooleanModel {
    public function __construct(){

    }
    public function getDatosBooleanos($cantidad,$modo){
        $valores=array();
        switch($modo){
            case'aleatorio':
                for($i=0;$i<$cantidad;$i++){
                    $numero=rand(0,1);
                    if($numero==0){
                        $valores[$i]='false';
                    }else{
                        $valores[$i]='true';
                    }
                }
                break;
            case'true':
                for($i=0;$i<$cantidad;$i++){
                    $valores[$i]='true';
                }
                break;
            case'false':
                for($i=0;$i<$cantidad;$i++){
                    $valores[$i]='false';
                }
                break;
        }
        return $valores;
    }
}