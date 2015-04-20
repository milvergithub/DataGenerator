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
    public function getEstadoForanea($tablaRefenciada,$columnaRefenciada){
        $estado=true;
        $datosControl= file_get_contents("../projects/".$this->proyecto."/control/".$tablaRefenciada.".json");
        $datosTabla= file_get_contents("../projects/".$this->proyecto."/tables/".$tablaRefenciada.".json");
        $control = json_decode($datosControl,true);
        $tablas = json_decode($datosTabla,true);
        for($i=0;$i<count($control);$i++){
            if(($tablas[$i]['constraint_type']=='foraneas')OR($tablas[$i]['constraint_type']=='PRIMARY KEY')){
                if($control[$i]['rellenado']==false){
                    $estado=false;
                }
            }
        }
        return $estado;
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
    function setProccessTablaWithForeing($columna,$columnaref,$tabla,$tablaref,$cantidad){
        $this->setProccessTabla($columna,$this->getDatosForaneas($tablaref,$columnaref,$cantidad),$tabla);
    }
    function getDatosForaneas($tablaref,$columnaref,$cant){
        $contador=0;
        $ind=0;
        $datos=array();
        $tabladatos=$this->getDatosTabla($tablaref);
        $columnasFR=$this->getColumnasSeparadas($tablaref,$columnaref);
        //print_r($columnasFR);
        while($contador<$cant){
            if($ind>=count($tabladatos)){
                $ind=0;
            }
            $datos[$contador]=$this->getForaneas($ind,$tabladatos,$columnasFR);
            $ind=$ind+1;$contador=$contador+1;
        }
        return $datos;
    }
    function getForaneas($ii,$tabladatos,$columnasFR){
        $resultado=array();
        for($i=0;$i<count($columnasFR);$i++){
            array_push($resultado,$tabladatos[$ii][trim($columnasFR[$i])]);
        }
        return implode(",",$resultado);
    }
    function getColumnasSeparadas($tablaref,$columnasref){
        $columnasReales=array();
        $columnasNotFound=array();
        $columnas=explode(',',$columnasref);
        for($i=0;$i<count($columnas);$i++){
            array_push($columnasNotFound,$columnas[$i]);
            if($this->existeColumna($tablaref,implode(", ",$columnasNotFound))){
                array_push($columnasReales,implode(",",$columnasNotFound));
                $columnasNotFound=array();
            }
        }
        return $columnasReales;
    }
    function existeColumna($tablaref,$columnaref){
        $respuesta=false;
        $datos= file_get_contents("../projects/".$this->proyecto."/tables/".$tablaref.".json");
        $datosTabla=json_decode($datos,true);
        for($i=0;$i<count($datosTabla);$i++){
            if(trim($columnaref) == $datosTabla[$i]['column_name']){
                $respuesta=true;
            }
        }
        return $respuesta;
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