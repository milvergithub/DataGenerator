<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 06-09-14
 * Time: 11:20 AM
 */
//Para crear el archivo
function crear(){
    $xml = new DomDocument('1.0', 'UTF-8');

    $biblioteca = $xml->createElement('biblioteca');
    $biblioteca = $xml->appendChild($biblioteca);

    $libro = $xml->createElement('libro');
    $libro = $biblioteca->appendChild($libro);

    $autor = $xml->createElement('autor', 'Paulo Coelho');
    $autor = $libro->appendChild($autor);
    $titulo = $xml->createElement('titulo', 'El Alquimista');
    $titulo = $libro->appendChild($titulo);
    $anio = $xml->createElement('anio', '1988');
    $anio = $libro->appendChild($anio);
    $editorial = $xml->createElement('editorial', 'Maxico D.F. - Editorial Grijalbo');
    $editorial = $libro->appendChild($editorial);

    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('libros.xml');

    //Mostramos el XML puro
    echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>" .
        htmlentities($el_xml) . "<br/><hr>";
}

//Para leerlo
function leer(){
    echo "<p><b>Ahora mostrandolo con estilo</b></p>";
    $xml = simplexml_load_file('libros.xml');
    $salida = "";
    foreach ($xml->libro as $item) {
        $salida .=
            "<b>Autor:</b> " . $item->autor . "<br/>" .
            "<b>Título:</b> " . $item->titulo . "<br/>" .
            "<b>Ano:</b> " . $item->anio . "<br/>" .
            "<b>Editorial:</b> " . $item->editorial . "<br/><hr/>";
    }
    echo $salida;
}

function multiexplode($delimiters, $string){
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}
function formatearTablasAndReferenciados($arreglo){
    $retorno=array();
    for($i=0;$i<sizeof($arreglo);$i++){
        $fila=["tabla"=>$arreglo[$i]["tabla"],
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

function insertarElementos($res){
    $arreglo = array();
    for ($i = 0; $i < count($res); $i++) {
        $a = $res[$i];
        array_put_to_position($a, "false", 3, 'es_foranea');
        array_put_to_position($a, NULL, 4, 'referenciado');
        array_put_to_position($a, NULL, 5, 'tabla');
        array_put_to_position($a, NULL, 6, 'referenciados');
        $arreglo[$i] = $a;
    }
    return $arreglo;
}

?>