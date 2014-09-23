<?php
$xml = new DomDocument('1.0', 'UTF-8');
$conexion = $xml->createElement('conexion');
$conexion = $xml->appendChild($conexion);
$usuario = $xml->createElement('usuario','postgres');
$usuario = $conexion->appendChild($usuario);
$contrasena = $xml->createElement('contrasena','root');
$contrasena = $conexion->appendChild($contrasena);
$host = $xml->createElement('host','localhost');
$host = $conexion->appendChild($host);
$puerto = $xml->createElement('puerto','5432');
$puerto = $conexion->appendChild($puerto);

$xml->formatOutput = true;
$el_xml = $xml->saveXML();
$xml->save('projects/conexion.xml');

require_once 'model/cargarModel.php';
$tablas=new cargarModel();
require_once 'view/cargar.phtml';
?>
