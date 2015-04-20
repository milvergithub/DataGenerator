<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 16-03-15
 * Time: 04:38 PM
 */
require_once "../model/writerReadDatesModel.php";
require_once "../model/GeneratorDateTimeModel.php";
$generatorDateTime=new GeneratorDateTimeModel();
$model=new writerReadDatesModel($_POST['proyecto']);

$fechaInit=explode(" ",$_POST['fechaInicial']);
$fechaEnd=explode(" ",$_POST['fechaFinal']);

switch($_POST['formularioTipoOrigen']){
    case 'Date':
        $datos=$generatorDateTime->getFechas($fechaInit[0],$fechaEnd[0],$_POST['cantidad']);
        break;
    case 'Time':
        $datos=$generatorDateTime->getTimes($_POST['fechaInicial'],$_POST['fechaFinal'],$_POST['cantidad']);
        break;
    case 'DateTime':
        $datos=$generatorDateTime->getDateTimes($_POST['fechaInicial'],$_POST['fechaFinal'],$_POST['cantidad']);
        break;
}

$model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
$model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
$model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);

echo "succesfull..";