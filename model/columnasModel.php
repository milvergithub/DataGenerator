<?php
require_once "../config/ConexionPG.php";
require_once "../config/modulos.php";
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 27-08-14
 * Time: 10:48 AM
 */

class columnasModel {
    private $conexion;
    public function __construct($name) {
        $datos=getDatosConexion("../projects/".$name."/conexion/conexion.xml");
        $this->conexion=new ConexionPG(
            $datos[1],
            $datos[2],
            $datos[4],
            $datos[5],
            $datos[6]
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