<?php
session_start();
require_once"../model/columnasModel.php";
$fila=new columnasModel($_POST["proyecto"]);
$resultadoPCT=$fila->printColumnasTabla($_POST['tabla']);
require_once "../view/columnas.phtml";
?>