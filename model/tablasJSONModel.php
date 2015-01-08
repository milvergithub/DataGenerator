<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 08-01-15
 * Time: 10:34 AM
 */

class tablasJSONModel {
    private $nameProyecto;
    public function __construct($np){
        $this->nameProyecto="../projects/".$np;
    }
    public function getTablas(){
        $tablasJSON = file_get_contents($this->nameProyecto."/mapeo/mapeo.json");
        $tablas = json_decode($tablasJSON, true);
        return $tablas;
    }
    public function getPrintColumnsOK($tabla){
        $tablasJSON = file_get_contents($this->nameProyecto."/tables/".$tabla.".json");
        $columnasJSON = json_decode($tablasJSON, true);
        return $columnasJSON;
    }
    private function getEstadoColumna($tabla,$columna){
        $res=false;
        $dateTabla =file_get_contents($this->path."dates/".$tabla.".json");
        $tablaDatos=json_decode($dateTabla,true);
        if(sizeof($tablaDatos)>0){
            if (array_key_exists($columna, $tablaDatos[0])) {
                if(($tablaDatos[0][$columna])){
                    $res=true;
                }
            }
        }
        return $res;
    }
} 