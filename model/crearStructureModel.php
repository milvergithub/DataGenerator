<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 27/11/14
 * Time: 15:29
 */

class crearStructureModel {

    function __construct(){

    }
    function createConnectionOffline($nameProject,$host,$port,$dbms,$dbname,$user,$pass){
        $xml = new DomDocument('1.0', 'UTF-8');
        $conexion = $xml->createElement('conexion');
        $conexion = $xml->appendChild($conexion);//nombre proyecto
        $nombre = $xml->createElement('nombre', $nameProject);
        $nombre = $conexion->appendChild($nombre);//host
        $hosting = $xml->createElement('host', $host);
        $hosting = $conexion->appendChild($hosting);//puerto
        $port = $xml->createElement('puerto', $port);
        $port = $conexion->appendChild($port);//motor
        $motor = $xml->createElement('motor', $dbms);
        $motor = $conexion->appendChild($motor);//base de datos
        $basedatos = $xml->createElement('base', $dbname);
        $basedatos = $conexion->appendChild($basedatos);//usuario
        $usuario = $xml->createElement('usuario', $user);
        $usuario = $conexion->appendChild($usuario);//contrasena
        $contrasena = $xml->createElement('password', $pass);
        $contrasena = $conexion->appendChild($contrasena);
        $xml->formatOutput = true;
        $el_xml = $xml->saveXML();
        $xml->save('../projects/' . $_POST[NOMBRE_PROYECTO] . '/conexion/conexion.xml');
        chmod("../projects/" . $_POST[NOMBRE_PROYECTO] . "/conexion/conexion.xml", 0777);
    }
}