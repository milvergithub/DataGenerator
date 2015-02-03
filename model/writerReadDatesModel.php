<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 02-02-15
 * Time: 03:43 PM
 */

class writerReadDatesModel {
    private $proyecto;
    function __construct($p){
        $this->proyecto=$p;
    }
    function getDatosTabla($tabla){
        $datos = file_get_contents("../projects/".$this->proyecto."dates/".$tabla.".json");
        $datosTabla = json_decode($datos, true);
        return $datosTabla;
    }
    function setProccessTabla($columna,$datos,$tabla){
        $datosActuales=$this->getDatosTabla($tabla);
        if ($datosActuales !=NULL) {
            for ($cont = 0; $cont < count($datosActuales); $cont++) {
                array_put_to_position($datosActuales[$cont],$datos[$cont], 0, $columna);
            }
        }else{
            for($cont = 0; $cont < count($datos); $cont++) {
                $array = array($columna => $datos[$cont]);
                $datosActuales[$cont]=$array;
            }
        }
        $this->setWriteDatosTabla($tabla,$datosActuales);
    }
    function setWriteDatosTabla($tabla,$datos){
        /*escribimos en el archivo*/
        $datoTabla = $datos;
        $formatJSON = json_encode($datoTabla, JSON_UNESCAPED_UNICODE);
        $openFileTable = fopen("../projects/".$this->proyecto."/dates/".$tabla.".json",'w');
        fwrite($openFileTable, $formatJSON);
        fclose($openFileTable);
    }
}