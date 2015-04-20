<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 16-03-15
 * Time: 10:38 AM
 */
require_once "../model/writerReadDatesModel.php";
require_once "../model/GeneratorFakermodel.php";
require_once "../model/GeneratorTextModel.php";
$generadorAlgoritmoText=new GeneratorFakermodel($_POST['idiomaSeleccionado']);
$model=new writerReadDatesModel($_POST['proyecto']);
switch($_POST['algorimoSeleccionado']){
    case "palabras"://si queremos generar palabras al azar
        $generadorAlgoritmoText=new GeneratorTextModel();
        $datos=$generadorAlgoritmoText->getPalabras($_POST['cantidad']);
        $model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
        $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
        $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
        break;
    case "emails":
        $datos=$generadorAlgoritmoText->getEmails($_POST['cantidad']);
        $model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
        $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
        $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
        break;
    case "direciones":
        $datos=$generadorAlgoritmoText->getDirecciones($_POST['cantidad']);
        $model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
        $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
        $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
        break;
    case "nombrecompleto":
        $datos=$generadorAlgoritmoText->nombreCompleto($_POST['cantidad']);
        $model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
        $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
        $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
        break;
    case "nombres":
        $datos=$generadorAlgoritmoText->getNombres($_POST['cantidad']);
        $model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
        $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
        $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
        break;
    case "apellidos":
        $datos=$generadorAlgoritmoText->getApellidos($_POST['cantidad']);
        $model->setProccessTabla($_POST['columna'],$datos,$_POST['tablaActual']);
        $model->cambiarEstadoColumna($_POST['tablaActual'],$_POST['columna']);
        $model->setCantidadDatosTabla($_POST['tablaActual'],$_POST['cantidad']);
        break;
}

echo "SUCCESSFULL...";