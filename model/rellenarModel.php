<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 24-02-15
 * Time: 10:40 AM
 */
require_once "../model/writerReadDatesModel.php";
require_once "../model/ConecctionModel.php";

class rellenarModel extends writerReadDatesModel{
    private $conexion;
    private $project;
    public function __construct($proyecto){
        parent::__construct($proyecto);
        $this->project=$proyecto;
        $this->conexion=new ConecctionModel($proyecto);
    }

    protected function getProyect(){
        return $this->project;
    }
    protected function getNombreAtributosTabla($tabla){
        $resultado = parent::getDetalleTabla($tabla);
        $retorno=array();
        for($i=0;$i<count($resultado);$i++){
            $retorno[$i]=$resultado[$i]['column_name'];
        }
        return $retorno;
    }
    protected function getNameTypeAtributesTable($tabla){
        $resultado = parent::getDetalleTabla($tabla['tablename']);
        $retorno=array();
        for($i=0;$i<count($resultado);$i++){
            $retorno[$i]=array('column_name'=>$resultado[$i]['column_name'],'data_type'=>$resultado[$i]['data_type']);
        }
        return $retorno;
    }

    function setRellenarDatos($tabla){
        $sqlTableFill="";
        $atributos=$this->getNombreAtributosTabla($tabla['tablename']);
        $listaDatos=parent::getDatosTabla($tabla['tablename']);
        $conx=pg_connect("host=localhost port=5432 dbname=demo user=postgres password=postgres")
        or die ('Error de conexión. Póngase en contacto con el administrador');
        for($i=0;$i<sizeof($listaDatos);$i++){
            $sqlTableFill .=$this->getFormatSQL($tabla,$atributos,$listaDatos[$i]);
            pg_query($conx,$this->getFormatSQL($tabla,$atributos,$listaDatos[$i]));
        }
        return $sqlTableFill;
    }
    private function getFormatSQL($tabla,$atributos,$datos){
        $atributosTypes=$this->getNameTypeAtributesTable($tabla);
        $valuesPopulate=$this->getValuesFormat($atributosTypes,$datos);
        return "INSERT INTO ".$tabla['tablename']." (".implode(',',$atributos).") VALUES (".$valuesPopulate.");";
    }
    private function getValuesFormat($atributosTypes,$datos){
        $datoRetorno=array();
        for($i=0;$i<count($atributosTypes);$i++){
            if(($atributosTypes[$i]['data_type']=="bytea")){
                // Leer en un fichero binario
                $data = file_get_contents('../projects/'.$this->getProyect().'/files/'.$datos[$atributosTypes[$i]['column_name']]);
                // Escapar el dato binario
                $escaped = pg_escape_bytea($data);
                $datoRetorno[$i]="'{$escaped}'";
            }else{
                if( ($atributosTypes[$i]['data_type']=="smallint") OR
                    ($atributosTypes[$i]['data_type']=="integer") OR
                    ($atributosTypes[$i]['data_type']=="bigint") OR
                    ($atributosTypes[$i]['data_type']=="serial") OR
                    ($atributosTypes[$i]['data_type']=="bigserial") OR
                    ($atributosTypes[$i]['data_type']=="numeric") OR
                    ($atributosTypes[$i]['data_type']=="decimal")OR
                    ($atributosTypes[$i]['data_type']=="real") OR
                    ($atributosTypes[$i]['data_type']=="double precision") OR
                    ($atributosTypes[$i]['data_type']=="FOREIGN") OR//FOREIGN
                    ($atributosTypes[$i]['data_type']=="money")OR//si tipo money sigue siendo un numero
                    ($atributosTypes[$i]['data_type']=="boolean")){//si es boleano puede ir como false o true
                    if($datoRetorno[$i]=$datos[$atributosTypes[$i]['column_name']]!=null){
                        $datoRetorno[$i]=$datos[$atributosTypes[$i]['column_name']];
                    }else{
                        $datoRetorno[$i]=null;
                    }
                }else{
                    if( ($atributosTypes[$i]['data_type']=="character varying") OR
                        ($atributosTypes[$i]['data_type']=="varchar") OR
                        ($atributosTypes[$i]['data_type']=="character") OR
                        ($atributosTypes[$i]['data_type']=="char") OR
                        ($atributosTypes[$i]['data_type']=="text")OR
                        ($atributosTypes[$i]['data_type']=="time without time zone") OR//los datos date and time se insertan como cadenas
                        ($atributosTypes[$i]['data_type']=="time with time zone") OR
                        ($atributosTypes[$i]['data_type']=="timestamp without time zone") OR
                        ($atributosTypes[$i]['data_type']=="timestamp with time zone") OR
                        ($atributosTypes[$i]['data_type']=="interval") OR
                        ($atributosTypes[$i]['data_type']=="date")){//los archivo binarios tambien van como cadenas y \ escapereate
                        /*SI EL TIPO DE DATO ES una cadena de caracteres*/
                        if($datoRetorno[$i]=$datos[$atributosTypes[$i]['column_name']]!=null){
                            $datoRetorno[$i]="'".$datos[$atributosTypes[$i]['column_name']]."'";
                        }else{
                            $datoRetorno[$i]='NULL';
                        }
                    }
                }
            }
        }
        return implode(",",$datoRetorno);
    }
}