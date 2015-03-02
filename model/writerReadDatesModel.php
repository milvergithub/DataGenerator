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
    protected function getDatosTabla($tabla){
        $datos = file_get_contents("../projects/".$this->proyecto."/dates/".$tabla.".json");
        $datosTabla = json_decode($datos, true);
        return $datosTabla;
    }
    protected function getStatusTabla($tabla){
        $datos = file_get_contents("../projects/".$this->proyecto."/control/".$tabla.".json");
        $datosTabla = json_decode($datos, true);
        return $datosTabla;
    }
    protected function getDetalleTabla($tabla){
        $datos = file_get_contents("../projects/".$this->proyecto."/control/".$tabla.".json");
        $datosTabla = json_decode($datos, true);
        return $datosTabla;
    }
    protected function getNombreTablas(){
        $datos = file_get_contents("../projects/".$this->proyecto."/mapeo/mapeo.json");
        $datosTabla = json_decode($datos, true);
        return $datosTabla;
    }
    public function getListaTablas(){
        return $this->getNombreTablas();
    }
    public function getListaAtributos($tabla){
        return $this->getStatusTabla($tabla);
    }
    function setProccessTabla($columna,$datos,$tabla){
        $datosActuales=$this->getDatosTabla($tabla);
        if ($datosActuales !=NULL) {
            for ($cont = 0; $cont < count($datosActuales); $cont++) {
                $this->array_put_to_position($datosActuales[$cont],$datos[$cont], 0, $columna);
            }
        }else{
            for($cont = 0; $cont < count($datos); $cont++) {
                $array = array($columna => $datos[$cont]);
                $datosActuales[$cont]=$array;
            }
        }
        $this->setWriteDatosTabla($tabla,$datosActuales);
    }
    function setWriteDatosTabla($tabla,$datosActuales){
        /*escribimos en el archivo*/
        $datoTabla = $datosActuales;
        $formatJSON = json_encode($datoTabla, JSON_UNESCAPED_UNICODE);
        $openFileTable = fopen("../projects/".$this->proyecto."/dates/".$tabla.".json",'w+');
        fwrite($openFileTable, $formatJSON);
        fclose($openFileTable);
    }
    function array_put_to_position(&$array, $object, $position, $name = null){
        $count = 0;
        $return = array();
        foreach ($array as $k => $v) {
            if ($count == $position) {
                if (!$name) $name = $count;
                $return[$name] = $object;
                $inserted = true;
            }
            $return[$k] = $v;
            $count++;
        }
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        $array = $return;
        return $array;
    }
    function cambiarEstadoColumna($tabla,$columna){
        /* cambiamos el estado de la columna */
        $statusColumns=$this->getStatusTabla($tabla);
        for($i=0;$i<count($statusColumns);$i++){
            if($statusColumns[$i]['column_name']==$columna){
                $statusColumns[$i]["rellenado"]=true;
            }
        }
        $datoTabla = $statusColumns;
        $StatusJSON = json_encode($datoTabla, JSON_UNESCAPED_UNICODE);
        $openFileTable = fopen("../projects/".$this->proyecto."/control/".$tabla.".json",'w');
        fwrite($openFileTable, $StatusJSON);
        fclose($openFileTable);
    }
    function getCantidadDatosTabla($tabla){
        $tablas=$this->getNombreTablas();
        $cantidad=0;
        for($i=0;$i<count($tablas);$i++){
            if($tablas[$i]['tablename']==$tabla){
                $cantidad=$tablas[$i]['cantidad'];
            }
        }
        return $cantidad;
    }
    function setCantidadDatosTabla($tabla,$cantidad){
        $tablas=$this->getNombreTablas();
        for($i=0;$i<count($tablas);$i++){
            if($tablas[$i]["tablename"]==$tabla){
                $tablas[$i]["cantidad"]=$cantidad;
            }
        }
        $datoTabla = $tablas;
        $cantidadJSON = json_encode($datoTabla, JSON_UNESCAPED_UNICODE);
        $openFileMapeo = fopen("../projects/".$this->proyecto."/mapeo/mapeo.json",'w');
        fwrite($openFileMapeo, $cantidadJSON);
        fclose($openFileMapeo);
    }
}