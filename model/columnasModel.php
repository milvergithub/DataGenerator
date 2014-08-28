<?php
require_once "../config/ConexionPG.php";
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 27-08-14
 * Time: 10:48 AM
 */

class columnasModel {
    private $conexion;
    public function __construct() {
        $this->conexion=new ConexionPG(
            $_SESSION['host'],
            $_SESSION['puerto'],
            $_SESSION['base'],
            $_SESSION['usuario'],
            $_SESSION['password']
        );
    }
    function printTables() {
        $sqlPT="SELECT tablename FROM pg_tables WHERE schemaname = 'public'";
        $resPT= $this->conexion->Consultas($sqlPT);
        return $resPT;
    }
    public function printColumnasTabla($tabla) {
        $resultadoPCT=  $this->detalleTabla($tabla);
        return $resultadoPCT;
    }
    function detalleTabla($tabla) {
        $sqlDT="SELECT column_name,column_default,is_nullable,column_default AS llave,data_type FROM information_schema.columns WHERE table_name = '".$tabla."';";
        $resFT=  $this->conexion->Consultas($sqlDT);
        return $resFT;
    }
} 