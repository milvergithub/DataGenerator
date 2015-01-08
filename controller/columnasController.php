<?php
session_start();
require_once"../model/tablasJSONModel.php";
$tabla=new tablasJSONModel($_POST["proyecto"]);
$resultado=$tabla->getPrintColumnsOK($_POST['tabla']);
require_once "../view/columnas.phtml";
?>