<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 18/11/14
 * Time: 11:10
 */

class createDirModel {
    public function __construct(){

    }
    public function createDir($ruta,$permiso){
        mkdir($ruta, $permiso);
        chmod($ruta, $permiso);
    }
    public function crearFileJSON($ruta, $permiso){
        $fileMaping = fopen($ruta, $permiso);
        chmod($ruta, 0777);
    }
} 