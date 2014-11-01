<?php

require_once "config/ConexionPG.php";
require_once "config/modulos.php";

/**
 * Description of Tablas
 * @author milver
 */
class loadModel {

    private $path;

    function __construct($directorio) {
        $this->path="projects/".$directorio."/";
    }
    public function printDetalleTable($tabla) {
        $datos = file_get_contents($this->path."tables/".$tabla.".json");
        $detalle = json_decode($datos, true);
        return $detalle;
    }
    public function getTablesAndReferences() {
        $mapa = file_get_contents($this->path."mapeo/mapeo.json");
        $mapaTablas = json_decode($mapa, true);
        return $mapaTablas;
    }
}
?>
