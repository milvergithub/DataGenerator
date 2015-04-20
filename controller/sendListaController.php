<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 12-03-15
 * Time: 08:49 AM
 */
require_once "../model/writerReadDatesModel.php";
require_once "../model/GeneratorTextModel.php";
$generatorTexto=new GeneratorTextModel();
$model=new writerReadDatesModel($_POST['proyecto']);

$datos=$generatorTexto->getContenidoLista($_POST['contenido'],$_POST['cantidad']);
$model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
$model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
$model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
echo "SUCCESSFULL...";