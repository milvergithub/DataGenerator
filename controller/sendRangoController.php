<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 02-02-15
 * Time: 02:34 PM
 */
require_once "../model/writerReadDatesModel.php";
require_once "../model/GeneratorNumericsModel.php";
$generatorNumbers=new GeneratorNumericsModel();
$model=new writerReadDatesModel($_POST['proyecto']);
$datos=$generatorNumbers->getNumerosEnteros($_POST['minimo'],$_POST['maximo'],$_POST['cantidad']);
$model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
$model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
$model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
echo "SUCCESSFULL...";