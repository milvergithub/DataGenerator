<?php
/**
 * Description of Tablas
 * @author milver
 */
class loadModel {

    private $path;

    function __construct($directorio) {
        $this->path="projects/".$directorio."/";
    }
    public function printDetalleTableLoad($tabla) {
        $datos = file_get_contents($this->path."tables/".$tabla.".json");
        $detalle = json_decode($datos, true);
        return $detalle;
    }
    public function getTablesAndReferencesLoad() {
        $mapa = file_get_contents($this->path."mapeo/mapeo.json");
        $mapaTablas = json_decode($mapa, true);
        return $mapaTablas;
    }
    public function getStatusTableColumnLoad($tabla,$columa){
        $res="no existe";
        $dateMapeo =file_get_contents($this->path."mapeo/mapeo.json");
        $tablas=json_decode($dateMapeo,true);
        for($i=0;$i<count($tablas);$i++){
            if($tablas[$i]['tablename']==$tabla){
                $fila=$tablas[$i];
                $cantidad=$fila['cantidad'];
                if($cantidad>0){
                    $res="existe";
                }
            }
            break;
        }
        return $res;
    }
    public function getStatusColumnLoad($tabla,$columna){
        $res="no existe";
        $dateTabla =file_get_contents($this->path."control/".$tabla.".json");
        $tablaDatos=json_decode($dateTabla,true);
        for($i=0;$i<count($tablaDatos);$i++){
            if(trim($tablaDatos[$i]["column_name"])==trim($columna)){
                if($tablaDatos[$i]["rellenado"]==true){
                    $res="existe";
                }else{
                    $res="no existe";
                }
            }
        }
        return $res;
    }
}
?>
