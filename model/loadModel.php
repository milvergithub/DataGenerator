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
    public function getStatusColumnLoad($tabla,$columna){
        $res="no existe";
        $dateTabla =file_get_contents($this->path."dates/".$tabla.".json");
        $tablaDatos=json_decode($dateTabla,true);
        if(sizeof($tablaDatos)>0){
            if (array_key_exists($columna, $tablaDatos[0])) {
                if(($tablaDatos[0][$columna])){
                    $res="existe";
                }
            }

        }
        return $res;
    }
}
?>
