<?php
session_start();
require_once"../model/columnasModel.php";
$fila=new columnasModel();
$resultadoPCT=$fila->printColumnasTabla($_POST['tabla']);
require_once "../view/columnas.phtml";
?>