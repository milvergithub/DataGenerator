<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 06-09-14
 * Time: 11:20 AM
 */

function multiexplode($delimiters, $string){
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}
function formatearTablasAndReferenciados($arreglo){
    $retorno=array();
    for($i=0;$i<sizeof($arreglo);$i++){
        $fila=["tabla"=>$arreglo[$i]["tablas"],
               "referencias"=>getTableOnlyReferenced($arreglo[$i]["referencias"]),
               "revisado"=>"false"];
        $retorno[$i]=$fila;
    }
    return $retorno;
}
function getTableOnlyReferenced($cadena){
    //"FOREIGN KEY (cod_rol_para, cod_usu_para) REFERENCES usuario(cod_rol, cod_usu) ON UPDATE RESTRICT ON DELETE RESTRICT"
    $arreglo=multiexplode(array("(",")"),$cadena);
    $analizar=getNameOnlyTable(trim($arreglo[2]));
    return $analizar;
}
function getNameOnlyTable($cadena){
    $name=explode(" ",$cadena);
    return trim($name[1]);
}
function dameImportantes($arreglo){
    $respuesta = array();
    $referencian = $arreglo[1];
    $entidad = explode(":", implode(":", explode(" ", trim($arreglo[2]))));
    $tabla = $entidad[1];
    $referenciados = $arreglo[3];
    $respuesta[0] = $referencian;
    $respuesta[1] = $tabla;
    $respuesta[2] = $referenciados;
    return $respuesta;
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
function getDatosConexion($url){
    $xml = simplexml_load_file($url);
    //print_r($xml);
    $salida = array();
    $datosConexion=$xml;
    $salida[0]=$datosConexion->nombre;
    $salida[1]=$datosConexion->host;
    $salida[2]=$datosConexion->puerto;
    $salida[3]=$datosConexion->motor;
    $salida[4]=$datosConexion->base;
    $salida[5]=$datosConexion->usuario;
    $salida[6]=$datosConexion->password;
    return $salida;
}

function insertarElementos($res){
    $arreglo = array();
    for ($i = 0; $i < count($res); $i++) {
        $a = $res[$i];
        array_put_to_position($a, "false", 3, 'es_foranea');
        array_put_to_position($a, NULL, 4, 'referencian');
        array_put_to_position($a, NULL, 5, 'tabla');
        array_put_to_position($a, NULL, 6, 'referenciados');
        $arreglo[$i] = $a;
    }
    return $arreglo;
}
?>