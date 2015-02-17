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
if($_POST['aleatorio']=='false'){
    $aleatorio=false;
}else{
    $aleatorio=true;
}

$datos=$generatorNumbers->getNumerosEnteros($_POST['minimo'],$_POST['maximo'],$_POST['cantidad'],$aleatorio);
$model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
echo "SUCCESSFULL...";