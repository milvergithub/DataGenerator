<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 24-02-15
 * Time: 11:08 AM
 */
require_once "../config/ConexionPG.php";
class ConecctionModel extends ConexionPG{

    function __construct($proyecto){
        $datos = getDatosConexion("../projects/" . $proyecto . "/conexion/conexion.xml");
        parent::__construct($datos[1], $datos[2], $datos[4], $datos[5], $datos[6]);
    }
}