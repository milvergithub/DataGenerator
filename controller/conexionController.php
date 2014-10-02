<?php
session_start();
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
    $nombre = $xml->createElement('nombre', $_POST['nombreProyecto']);
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
    if(file_exists("../projects/".$_POST['nombreProyecto'])){
        header("Location: ../index.php?accion=login&msm=1");
    }
    else{
        mkdir("../projects/".$_POST['nombreProyecto']."", 0777);
        chmod("../projects/".$_POST['nombreProyecto']."", 0777);
        mkdir("../projects/".$_POST['nombreProyecto']."/conexion", 0777);
        chmod("../projects/".$_POST['nombreProyecto']."/conexion", 0777);
        mkdir("../projects/".$_POST['nombreProyecto']."/tables", 0777);
        chmod("../projects/".$_POST['nombreProyecto']."/tables", 0777);
        $xml->save('../projects/'.$_POST['nombreProyecto'].'/conexion/conexion.xml');
        chmod("../projects/".$_POST['nombreProyecto']."/conexion/conexion.xml", 0777);

        $config = "host=" . $_POST['host'] . " port=" . $_POST['puerto'] . " dbname=" . $_POST['nombrebasedatos'] . " user=" . $_POST['usuario'] . " password=" . $_POST['pass'] . "";
        try {
            $cnx = pg_connect($config) or die ("Error de conexion. " . pg_last_error());
        } catch (Exception $exc) {

        }
        if ($cnx) {
            header("Location: ../index.php?accion=cargar&project=".$_POST['nombreProyecto']."");
        } else {
            echo 'error';
        }
    }
}
?>
