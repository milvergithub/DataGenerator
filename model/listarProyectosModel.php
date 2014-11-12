<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 30/09/14
 * Time: 16:53
 */

class listarProyectosModel {

    function __construct(){

    }
    function actionMostrarProyectos(){
        $directorio = opendir("projects");
        return $directorio;
    }
} 