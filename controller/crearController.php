<?php
require_once "../config/config.php";
require_once "../model/crearModel.php";
$basededatos = $_POST['basededatos'];
if ($basededatos == "PostgreSQL") {
    $_SESSION['host'] = $_POST['host'];
    $_SESSION['puerto'] = $_POST['puerto'];
    $_SESSION['base'] = $_POST['nombrebasedatos'];
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['password'] = $_POST['pass'];


    $xml = new DomDocument('1.0', 'UTF-8');
    $conexion = $xml->createElement('conexion');
    $conexion = $xml->appendChild($conexion);
//nombre proyecto
    $nombre = $xml->createElement('nombre', $_POST[NOMBRE_PROYECTO]);
    $nombre = $conexion->appendChild($nombre);
//host
    $hosting = $xml->createElement('host', $_POST['host']);
    $hosting = $conexion->appendChild($hosting);
//puerto
    $port = $xml->createElement('puerto', $_POST['puerto']);
    $port = $conexion->appendChild($port);
//motor
    $motor = $xml->createElement('motor', $_POST['basededatos']);
    $motor = $conexion->appendChild($motor);
//base de datos
    $basedatos = $xml->createElement('base', $_POST['nombrebasedatos']);
    $basedatos = $conexion->appendChild($basedatos);
//usuario
    $usuario = $xml->createElement('usuario', $_POST['usuario']);
    $usuario = $conexion->appendChild($usuario);
//contrasena
    $contrasena = $xml->createElement('password', $_POST['pass']);
    $contrasena = $conexion->appendChild($contrasena);

    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    if (file_exists("../projects/" . $_POST[NOMBRE_PROYECTO])) {
        header("Location: ../index.php?accion=login&msm=1");
    } else {
        mkdir("../projects/" . $_POST[NOMBRE_PROYECTO] . "", 0777);
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "", 0777);
        mkdir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/conexion", 0777);
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/conexion", 0777);
        mkdir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables", 0777);
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables", 0777);
        mkdir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates", 0777);
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates", 0777);
        mkdir("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo", 0777);
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo", 0777);
        $xml->save('../projects/' . $_POST[NOMBRE_PROYECTO] . '/conexion/conexion.xml');
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/conexion/conexion.xml", 0777);

        $config = "host=" . $_POST['host'] . " port=" . $_POST['puerto'] . " dbname=" . $_POST['nombrebasedatos'] . " user=" . $_POST['usuario'] . " password=" . $_POST['pass'] . "";
        try {
            $cnx = pg_connect($config) or die ("Error de conexion. " . pg_last_error());
        } catch (Exception $exc) {

        }
        if ($cnx) {
            if (file_exists("../projects/" . $_POST[NOMBRE_PROYECTO])) {
                $tablas = new crearModel($_POST[NOMBRE_PROYECTO]);

                $resultadoPT = $tablas->getTablesAndReferences();
                /*.........MAPEANDO..........*/
                $fileMaping = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo/mapeo.json", "w+");
                chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo/mapeo.json", 0777);
                $mapeoRPT = json_encode($resultadoPT, JSON_UNESCAPED_UNICODE);
                $fhMRPT = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/mapeo/mapeo.json", 'w');
                fwrite($fhMRPT, $mapeoRPT);
                fclose($fhMRPT);
                /*.........MAPEANDO..........*/
                for ($contador = 1; $contador <= sizeof($resultadoPT); $contador++) {
                    /*creo archivo JSON con el nombre de la tabla que contendra los datos a rellenar*/
                    $fp = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates/" . $resultadoPT[$contador - 1]['tablename'] . ".json", "w+");
                    /*creo archivo JSON con el nombre de la tabla que contendra el detalle de la tabla*/
                    $fpdt = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables/" . $resultadoPT[$contador - 1]['tablename'] . ".json", "w+");
                    if ($fp == false) {
                        die("No se ha podido crear el archivo.");
                    } else {
                        /*permiso al archivo que tendra los datos a rellenar*/
                        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 0777);
                        /*permiso al archivo que tendra el detalle de la tabla*/
                        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 0777);

                        /*asigno un arreglo vacio al archivo que tendra los datos a rellenar*/
                        $contenido = array();
                        $jsonencoded = json_encode($contenido, JSON_UNESCAPED_UNICODE);
                        $fh = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/dates/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 'w');
                        fwrite($fh, $jsonencoded);
                        fclose($fh);

                        /*asigo los valores del detalle de ta tabla*/
                        $detalleTabla = $tablas->detalleTabla($resultadoPT[$contador - 1]['tablename']);
                        $jsonencodedDT = json_encode($detalleTabla, JSON_UNESCAPED_UNICODE);
                        $fhDT = fopen("../projects/" . $_POST[NOMBRE_PROYECTO] . "/tables/" . $resultadoPT[$contador - 1]['tablename'] . ".json", 'w');
                        fwrite($fhDT, $jsonencodedDT);
                        fclose($fhDT);

                    }
                }
            } else {
                header("Location: ../index.php?" . ACTION . "=error");
            }
            header("Location: ../index.php?" . ACTION . "=load&" . PROYECTO . "=" . $_POST[NOMBRE_PROYECTO] . "");
        } else {
            echo 'error';
        }
    }
}
?>
