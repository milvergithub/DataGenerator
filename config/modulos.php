<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 06-09-14
 * Time: 11:20 AM
 */
function multiexplode ($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
function dameImportantes($arreglo) {
    $respuesta=array();
    $referencian=$arreglo[1];
    $entidad= explode(":", implode(":", explode(" ",trim($arreglo[2]))));
    $tabla=$entidad[1];
    $referenciados=$arreglo[3];
    $respuesta[0]=$referencian;
    $respuesta[1]=$tabla;
    $respuesta[2]=$referenciados;
    return $respuesta;
}
function array_put_to_position(&$array, $object, $position, $name = null){
    $count = 0;
    $return = array();
    foreach ($array as $k => $v) {
        if ($count == $position){
            if (!$name)$name = $count;
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
function insertarElementos($res){
    $arreglo=array();
    for ($i = 0; $i < count($res); $i++) {
        $a=$res[$i];
        array_put_to_position($a,'false', 3, 'es_foranea');
        array_put_to_position($a,NULL, 4, 'referenciado');
        array_put_to_position($a,NULL, 5, 'tabla');
        array_put_to_position($a,NULL,6,'referenciados');
        $arreglo[$i]=$a;
    }
    return $arreglo;
}
?>